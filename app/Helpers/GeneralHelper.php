<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

if (!function_exists('generateAccountNumber')) {
    function generateAccountNumber()
    {
        do {
            // Get the current date in DDMMYYYY format (e.g., 28112024)
            $datePart = now()->format('dmY'); // Example: "28112024"

            // Generate a random 8-digit number
            $randomNumber = str_pad(mt_rand(10000000, 99999999), 8, '0', STR_PAD_LEFT); // Ensure 8 digits

            // Combine date part and random number
            $accountNumber = $datePart . $randomNumber;

            // Check if the account number already exists in the `users` table
            $exists = User::where('account_number', $accountNumber)->exists();
        } while ($exists);

        return $accountNumber;
    }
}

if (!function_exists('generateSlug')) {
    function generateSlug()
    {
        $args = func_get_args();
        $args = array_filter($args, function ($value) {
            return !empty($value);
        });

        if (empty($args)) {
            return Str::slug('default-slug');
        }
        $slugString = implode('-', $args);
        return Str::slug($slugString);
    }
}

if (!function_exists('timeAgo')) {
    function timeAgo(Carbon $date)
    {
        $now = Carbon::now();
        $diff = $now->diff($date);

        if ($diff->y) {
            return $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
        }
        if ($diff->m) {
            return $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
        }
        if ($diff->d) {
            return $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
        }
        if ($diff->h) {
            return $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
        }
        if ($diff->i) {
            return $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
        }
        if ($diff->s) {
            return $diff->s . ' second' . ($diff->s > 1 ? 's' : '') . ' ago';
        }

        return 'just now';
    }
}

if (!function_exists('checkUserName')) {
    function checkUserName($username)
    {
        return User::where('username', $username)->exists();
    }
}

if (!function_exists('generateRandomNumber')) {
    function generateRandomNumber($number = 6)
    {
        // Define the characters to use for OTP generation
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $otp = '';
        // Loop to generate a 6-character OTP
        for ($i = 0; $i < $number; $i++) {
            $otp .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $otp;
    }
}


if (!function_exists('isActiveRoute')) {
    function isActiveRoute($routeName, $output = "active")
    {
        return request()->routeIs($routeName) ? $output : '';
    }
}

if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routeNames, $output = "active")
    {
        foreach ($routeNames as $routeName) {
            if (request()->routeIs($routeName)) {
                return $output;
            }
        }
        return '';
    }
}


if (!function_exists('generateAltText')) {
    function generateAltText($category, $service = "", $company = "TylaTwist Technologies Pvt Ltd")
    {
        $baseText = "$company - Best Website & App Development Company in India";

        $altTexts = [
            "about1" => "Pioneers in Digital Transformation by $baseText",
            "about2" => "Bridging Innovation and Functionality by $baseText",
            "about3" => "Expertise, Versatility, and Dedication by $baseText",
            "logo" => "$baseText Official Logo",
            "hero" => "Welcome to $company - Leading IT Solutions Provider",
            "website" => "Custom Website Development Services by $company",
            "app" => "Mobile App Development for Android & iOS - $company",
            "software" => "Enterprise Software & IT Solutions - $company",
            "team" => "Meet Our Expert Team at $company",
            "portfolio" => "Our Successful Web & App Development Projects - $company",
            "testimonials" => "Client Reviews and Success Stories - $company",
            "client" => "Client Success Stories with $company",
            "contact" => "Get in Touch with $company for IT Services"
        ];

        return $altTexts[$category] ?? "$service Services - $baseText";
    }
}

if (!function_exists('timeAgo')) {
    function timeAgo(Carbon $date)
    {
        $now = Carbon::now();
        $diff = $now->diff($date);

        if ($diff->y) {
            return $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
        }
        if ($diff->m) {
            return $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
        }
        if ($diff->d) {
            return $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
        }
        if ($diff->h) {
            return $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
        }
        if ($diff->i) {
            return $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
        }
        if ($diff->s) {
            return $diff->s . ' second' . ($diff->s > 1 ? 's' : '') . ' ago';
        }

        return 'just now';
    }
}

if (!function_exists('user_id')) {
    function user_id()
    {
        return config('app.user_id');
    }
}

if (!function_exists('short_name')) {
	function short_name(string $string, int $limit = 20): string
	{
		return strlen($string) > $limit ? mb_substr($string, 0, $limit) . '...' : $string;
	}
}