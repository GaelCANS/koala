@extends('emails.layout')

@section('content')

    <table cellpadding="32" cellspacing="0" border="0" align="center" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: white; border-radius: 0.5rem; margin-bottom: 1rem;">
        <tr>
            <td width="546" valign="top" style="border-collapse: collapse;">
                <div style="max-width: 600px; margin: 0 auto;">

                    <div style="background: white;text-align: center; border-radius: 0.5rem; margin-bottom: 1rem;">

                        {!! $content !!}

                    </div>

                </div>
            </td>
        </tr>
    </table>

@endsection