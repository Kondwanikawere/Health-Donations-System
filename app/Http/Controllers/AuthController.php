<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Carbon\Carbon;
use Illuminate\Support\Str; // Add this line
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller

{

    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Generate OTP
        $otp = rand(100000, 999999);
        $user->otp = Hash::make($otp);
        $user->otp_expires_at = Carbon::now()->addMinutes(10);
        $user->save();

        // Send OTP via email
        Mail::to($user->email)->send(new OtpMail($otp));

        return response()->json(['message' => 'OTP sent']);
    }


    public function signUp(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20|unique:users',
            'password' => 'required|string|min:8|confirmed', // Add 'confirmed' for password confirmation
        ]);

        // Generate OTP
        $otp = rand(100000, 999999);

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'token' => Str::random(60), // Generate a token upon registration
            'otp' => Hash::make($otp), // Save the hashed OTP
            'otp_expires_at' => Carbon::now()->addMinutes(10), // OTP expiry time
        ]);

        // Send OTP via email
        Mail::to($user->email)->send(new OtpMail($otp));

        return response()->json([
            'message' => 'User created successfully, OTP sent to email',
            'user' => $user
        ], 201);
    }

    public function verifyOtp(Request $request)
    {
        // Validate request
        $request->validate([
            'email' => 'required|string|email|max:255',
            'otp' => 'required|string|max:6',
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Check if OTP is correct and not expired
        if (Hash::check($request->otp, $user->otp) && Carbon::now()->lt($user->otp_expires_at)) {
            // OTP is valid, mark the user as verified
            $user->isVerified = true;
            $user->otp = null; // Clear the OTP
            $user->otp_expires_at = null; // Clear OTP expiration time
            $user->save();

            return response()->json(['message' => 'OTP verified successfully', 'user' => $user], 200);
        }

        // OTP is invalid or expired
        return response()->json(['message' => 'Invalid or expired OTP'], 400);
    }

    public function signIn(Request $request)
    {
        // Validate request
        $request->validate([
            'email' => 'required_without:phone|string|email|max:255',
            'phone' => 'required_without:email|string|max:20',
            'password' => 'required|string|min:8',
        ]);

        // Find user by email or phone
        $user = User::where('email', $request->email)
            ->orWhere('phone', $request->phone)
            ->first();

        // Check if user exists and password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid email/phone or password'], 401);
        }

        // Check if the user is an admin and if they are approved
        if ($user->isAdmin && !$user->isApprovedAdmin) {
            return response()->json(['message' => 'Pending admin approval'], 403);
        }

        // Create a new token
        $token = $user->createToken('Personal Access Token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user
        ]);
    }

public function verifyOtpp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->otp, $user->otp) || Carbon::now()->gt($user->otp_expires_at)) {
            return response()->json(['message' => 'Invalid or expired OTP'], 400);
        }

        // Clear OTP and generate a token
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        $token = $user->createToken('Personal Access Token')->plainTextToken;

        return response()->json(['token' => $token]);
    }

      public function logout(Request $request)
    {
        // Check if the user is authenticated
        $user = Auth::user();
        
        if ($user) {
            // Revoke all tokens for the authenticated user
            $user->tokens()->delete();
            
            return response()->json(['message' => 'Logged out successfully.']);
        }
        
        // If no authenticated user, return an error response
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function getProfile(Request $request)
{
    // Get the authenticated user via the token
    $user = auth()->user();

    // If user not found
    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    return response()->json([
        'message' => 'User profile fetched successfully',
        'user' => $user
    ]);
}

public function resendOtp(Request $request)
{
    // Validate the request
    $request->validate([
        'email' => 'required|string|email|max:255',
    ]);

    // Find the user by email
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    // Generate a new OTP
    $otp = rand(100000, 999999);
    $user->otp = Hash::make($otp);
    $user->otp_expires_at = Carbon::now()->addMinutes(10); // OTP expires in 10 minutes
    $user->save();

    // Send the new OTP via email
    Mail::to($user->email)->send(new OtpMail($otp));

    return response()->json(['message' => 'New OTP sent successfully']);
}

public function forgotPassword(Request $request)
{
    // Validate the request
    $request->validate([
        'email' => 'required|string|email|max:255',
    ]);

    // Find the user by email
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    // Generate a new OTP for password reset
    $otp = rand(100000, 999999);
    $user->otp = Hash::make($otp);
    $user->otp_expires_at = Carbon::now()->addMinutes(10); // OTP expires in 10 minutes
    $user->save();

    // Send OTP via email
    Mail::to($user->email)->send(new OtpMail($otp));

    return response()->json(['message' => 'Password reset OTP sent to email']);
}

public function resetPassword(Request $request)
{
    // Validate the request
    $request->validate([
        'email' => 'required|string|email|max:255',
        'otp' => 'required|string|max:6',
        'password' => 'required|string|min:8|confirmed', // Ensure password confirmation
    ]);

    // Find the user by email
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    // Check if the OTP is correct and not expired
    if (Hash::check($request->otp, $user->otp) && Carbon::now()->lt($user->otp_expires_at)) {
        // OTP is valid, reset the password
        $user->password = Hash::make($request->password);
        $user->otp = null; // Clear the OTP
        $user->otp_expires_at = null; // Clear OTP expiration time
        $user->save();

        return response()->json(['message' => 'Password reset successfully']);
    }

    // If OTP is invalid or expired
    return response()->json(['message' => 'Invalid or expired OTP'], 400);
}

}
