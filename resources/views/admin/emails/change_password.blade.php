<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Şifre Değişti</title>
    <style type="text/css">

        .heading{
            padding: 20px;
        }

        .content{
            padding-left: 20px;
        }

        .or_yer{
            padding-left: 20px;
            padding-top: 25px;
        }

        .bottom_yer{
            padding-left: 20px;
            padding-top: 20px;
            padding-bottom: 50px;
        }

        .text-center{
            text-align: center !important;
        }

        /*! Email Template */
        .email-wraper { background: #f5f6fa; font-size: 14px; line-height: 22px; font-weight: 400; color: #8094ae; width: 100%; }

        .email-wraper a { color: #333; word-break: break-all; }

        .email-wraper .link-block { display: block; }

        .email-ul { margin: 5px 0; padding: 0; }

        .email-ul:not(:last-child) { margin-bottom: 10px; }

        .email-ul li { list-style: disc; list-style-position: inside; }

        .email-ul-col2 { display: flex; flex-wrap: wrap; }

        .email-ul-col2 li { width: 50%; padding-right: 10px; }

        .email-body { width: 96%; max-width: 620px; margin: 0 auto; background: #ffffff; }

        .email-success { border-bottom: #1ee0ac; }

        .email-warning { border-bottom: #f4bd0e; }

        .email-btn { background: #333; border-radius: 4px; color: #ffffff !important; display: inline-block; font-size: 13px; font-weight: 600; line-height: 44px; text-align: center; text-decoration: none; text-transform: uppercase; padding: 0 30px; }

        .email-btn-sm { line-height: 38px; }

        .email-header, .email-footer { width: 100%; max-width: 620px; margin: 0 auto; }

        .email-logo { height: 40px; }

        .email-title { font-size: 13px; color: #333; padding-top: 12px; }

        .email-heading { font-size: 18px; color: #333; font-weight: 600; margin: 0; line-height: 1.4; }

        .email-heading-sm { font-size: 24px; line-height: 1.4; margin-bottom: .75rem; }

        .email-heading-s1 { font-size: 20px; font-weight: 400; color: #526484; }

        .email-heading-s2 { font-size: 16px; color: #526484; font-weight: 600; margin: 0; text-transform: uppercase; margin-bottom: 10px; }

        .email-heading-s3 { font-size: 18px; color: #333; font-weight: 400; margin-bottom: 8px; }

        .email-heading-success { color: #1ee0ac; }

        .email-heading-warning { color: #f4bd0e; }

        .email-note { margin: 0; font-size: 13px; line-height: 22px; color: #8094ae; }

        .email-copyright-text { font-size: 13px; }

        .email-social li { display: inline-block; padding: 4px; }

        .email-social li a { display: inline-block; height: 30px; width: 30px; border-radius: 50%; background: #ffffff; }

        .email-social li a img { width: 30px; }

        @media (max-width: 480px) { .email-preview-page .card { border-radius: 0; margin-left: -20px; margin-right: -20px; }
            .email-ul-col2 li { width: 100%; } }
    </style>
</head>
<body>

<table class="email-wraper">
    <tr>
        <td class="py-5">
            <table class="email-header">
                <tbody>
                <tr>
                    <td class="text-center pb-4">
                        <a href="#"><img class="email-logo" src="{{ asset('admin/images/logo-dark2x.png') }}" alt="logo"></a>
                        <p class="email-title">Yönetmeye Kaldığın Yerden Devam Et !</p>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="email-body">
                <tbody>
                <tr>
                    <td class="heading">
                        <h2 class="email-heading">Şifreniz Değişti</h2>
                    </td>
                </tr>
                <tr>
                    <td class="content">
                        <p>
                            Merhaba {{ $user->ad }},
                            <br>
                            Aşağıdaki IP adresi ve tarayıcı üzerinden hesabınızın şifresi değiştirilmiştir.
                        </p>
                        <h2>{{ $browser }}</h2>
                        <h2>{{ $ip }}</h2>
                        <p>
                            Bu işlem sizin tarafınızdan yapılmadıysa lütfen sistem yöneticiniz ile iletişime geçiniz.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td class="bottom_yer">
                        <p class="email-note">
                            Bu otomatik olarak oluşturulmuş bir e-postadır, lütfen bu e-postayı yanıtlamayın. Herhangi bir sorunla karşılaşırsanız, lütfen {{ config("app.mail_help") }} adresinden bizimle iletişime geçin.
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="email-footer">
                <tbody>
                <tr>
                    <td class="text-center pt-4">
                        <p class="email-copyright-text">© 2021 {{ config("app.name") }}. Tüm hakları saklıdır. <br> by <a href="{{ config("app.author_url") }}" target="_blank">{{ config("app.author_name") }}</a>.</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
