<div>
    <p>Dear HR Front desk,</p>
    <p>Below you find the alerts related to "{{$alerts->first()->subject}}" to be managed on the HRMS platform.</p>
    <table style="border: none;width:541.0pt;border-collapse:collapse;">
        <tbody>
            <tr>
                @foreach(json_decode($alerts->first()->body, true) as $alert_body_key =>$alert_body_value)
                <td style="width:39.0pt;border:solid black 1.0pt;background:#2B92C2;padding:0cm 3.5pt 0cm 3.5pt;height:30.0pt;">
                    <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:12px;font-family:"Arial",sans-serif;color:white;'>
                                {{$alert_body_key}}
                            </span>
                        </strong>
                    </p>
                </td>
                @endforeach
            </tr>
            @foreach($alerts as $key => $alert)
            <tr>
                @foreach(json_decode($alert->body, true) as $alert_body_key =>$alert_body_value)
                <td style="width:auto;border-top:none;border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0cm 3.5pt 0cm 3.5pt;height:20.0pt;">
                    <p style='margin:0cm;margin-bottom:.0001pt;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:12px;font-family:"Arial",sans-serif;color:black;'>
                            {{$alert_body_value}} </span>
                </td>
                @endforeach
                <td>
            </tr>
            @endforeach
    </table>

    <!-- Nothing -->
</div>