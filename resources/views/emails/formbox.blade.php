@extends('emails.layout')

@section('content')

    <table cellpadding="32" cellspacing="0" border="0" align="center" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: white; border-radius: 0.5rem; margin-bottom: 1rem;">
        <tr>
            <td width="546" valign="top" style="border-collapse: collapse;text-align: left">
                <div style="max-width: 600px; margin: 0 auto;text-align: left">

                    <div style="background: white;text-align: left; border-radius: 0.5rem; margin-bottom: 1rem;" align="">

                        <ul>
                            <li>Utilisateur : {{ $user }}</li>
                            <li>Demande : {{ $request->message }}</li>
                            <li>Heure de la demande : {{ date('Y-m-d h:i:s') }}</li>
                            <li>URL lors de la demande : {{ $request->url }}</li>
                            <li>User-agent : {{ $request->header('User-Agent') }}</li>
                        </ul>




                    </div>

                </div>
            </td>
        </tr>
    </table>

@endsection