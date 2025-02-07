<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif;">

<!-- login start -->
<section class="forget-password-section" style="padding-top: 2rem;">
    <div class="container" style="max-width: 800px; margin: auto;">
        <div class="row">
            <div class="col-md-6" style="margin: 0 auto;">
                <div class="forget-password-form" style="text-align: center; padding: 2rem; border: 1px solid #ccc; border-radius: 5px;">
                    <i class="fa-solid fa-key" style="font-size: 3rem; color: #0F3D3E; margin-bottom: 1rem;"></i>
                    <h1 style="font-size: 24px; color: #0F3D3E;"></h1>
                    <p style="color: #666;">No worries, we will send you reset instructions.</p>
                    <form>
                        <div class="mb-3">
                            <table style="width: 100%; border-collapse: collapse; margin-top: 1rem;">
                                <tbody>
                                    <tr>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; font-weight: bold; text-align: left;">Name</td>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; text-align: left" >Vikas</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; font-weight: bold; text-align: left;">U</td>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; text-align: left;">122.122.122</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; font-weight: bold; text-align: left;">Started</td>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; text-align: left;">2024-09-18 1:24:13</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; font-weight: bold; text-align: left;">Ended</td>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; text-align: left;">2024-09-18 1:30:01</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; font-weight: bold; text-align: left;">Length</td>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; text-align: left;">30 Minutes</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            
                        </div>
                        <a href="reset-password.html" style="display: block; width: 100%; background-color: #0F3D3E; border: none; color: #fff; font-size: 21px; margin-top: 1rem; padding: 0.5rem; border-radius: 5px; text-align: center; text-decoration: none;"> View Details</a>
                    </form>
                    {{-- <a href="login.html" style="text-decoration: none;">
                        <p class="back" style="margin-top: 2rem; font-weight: 600; color: red;">Back to Login</p>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- login end -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>



    {{-- <h1>forget password email</h1>

you can reset password from below link
<a href="{{route('mailforget', $token)}}"> Reset Password</a> 
    
--}}

