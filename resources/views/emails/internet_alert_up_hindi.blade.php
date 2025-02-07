<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internet Up Alert</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif;">

<!-- login start -->
<section class="forget-password-section" style="padding-top: 2rem;">
    <div class="container" style="max-width: 800px; margin: auto;">
        <div class="row">
            <div class="col-md-6" style="margin: 0 auto;background-color: #f4f4f4">
                <div class="forget-password-form" style="text-align: center; padding: 2rem; border: 1px solid #ccc; border-radius: 5px;">
                    <i class="fa-solid fa-key" style="font-size: 3rem; color: #0F3D3E; margin-bottom: 1rem;"></i>
                    <h1 style="font-size: 24px; color: #0F3D3E;"></h1>
                    <p style="color: #666;">इंटरनेट अप</p>
                    <form>
                        <div class="mb-3">
                            <table style="width: 100%; border-collapse: collapse; margin-top: 1rem;">
                                <tbody>
                                    <tr>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; font-weight: bold; text-align: left;">आईएसपी</td>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; text-align: left;">{{ $postdata[0] }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; font-weight: bold; text-align: left;">आईपी</td>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; text-align: left;">{{ $postdata[1] }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; font-weight: bold; text-align: left;">शाखा का नाम</td>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; text-align: left;">{{$postdata[2]}}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; font-weight: bold; text-align: left;">शाखा पता</td>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; text-align: left;">{{$postdata[3]}}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; font-weight: bold; text-align: left;">इस समय से  </td>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; text-align: left;">{{$postdata[4]}}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; font-weight: bold; text-align: left;">सेवा कार्यकारी</td>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; text-align: left;">{{$postdata[5]}}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; font-weight: bold; text-align: left;">संपर्क</td>
                                        <td style="border: 1px solid #ccc; padding: 0.5rem; text-align: left;">{{$postdata[6]}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            
                        </div>
                      
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- login end -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>