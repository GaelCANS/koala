@extends('emails.layout')

@section('content')
    
<table cellpadding="32" cellspacing="0" border="0" align="center" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: white; border-radius: 0.5rem; margin-bottom: 1rem;"><tr><td width="546" valign="top" style="border-collapse: collapse;">
            <div style="max-width: 600px; margin: 0 auto;">

                <div style="background: white;text-align: center; border-radius: 0.5rem; margin-bottom: 1rem;">
                    <br>
                    <h2 style="color: #01a3a6; line-height: 30px; margin-bottom: 12px; margin: 0 0 12px;">Vous avez oublié votre mot de passe !</h2>



                    <p style="font-size: 17px; line-height: 24px;text-align: center; margin: 0 0 16px;">Pas grave, on le réinitialise gratuitement ;)</p>


                    <div style="text-align: center; margin: 2rem 0 1rem;">
                        <table cellpadding="0" cellspacing="0" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #01a3a6; border-radius: 4px; padding: 14px 32px; display: inline-block;"><tr><td style="border-collapse: collapse;"><a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}" target="_blank" style="color: white; font-weight: normal; text-decoration: none; word-break: break-word; display: inline-block; letter-spacing: 1px; font-size: 20px; line-height: 26px;" align="center">Modifier mon mot de passe</a></td></tr></table></div>	<p style="font-size: 12px; line-height: 20px; margin: 0 auto 1rem; color: #AAA; text-align: center; max-width: 100%; word-break: break-word; margin-bottom: 2rem;">Vous pouvez aussi copier/coller ce lien dans votre navigateur :<br><a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}" style="color: #439fe0; font-weight: bold; text-decoration: none; word-break: break-word;">{{ $link }}</a></p>


                </div>

            </div>
        </td>
    </tr></table>

@endsection