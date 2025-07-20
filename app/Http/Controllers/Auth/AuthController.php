<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function teacher_register(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8',
            ]);

            $validatedData['password'] = Hash::make($validatedData['password']);

            $user = User::query()
                ->create([
                    ...$validatedData,
                    'role' => 'teacher'
                ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token
            ],201);
        } catch (ValidationException $e) {

            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {

            Log::error('Teacher registration failed: ' . $e->getMessage(), ['exception' => $e]);

            return response()->json([
                'message' => 'An unexpected error occurred during registration.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
// Написать логин для учителя, всё отрефакторить, и написать регистрацию по почте для учеников
