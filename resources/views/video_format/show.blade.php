<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Show Video_format</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Show Video_format</h1>
            <br>
            <form method = 'get' action = '{{url("video_format")}}'>
                <button class = 'btn btn-primary'>Video_format Index</button>
            </form>
            <br>
            <table class = 'table table-bordered'>
                <thead>
                    <th>Key</th>
                    <th>Value</th>
                </thead>
                <tbody>

                    
                    <tr>
                        <td>
                            <b><i>video_format_id : </i></b>
                        </td>
                        <td>{{$video_format->video_format_id}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>video_format_name : </i></b>
                        </td>
                        <td>{{$video_format->video_format_name}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>video_format_decscription : </i></b>
                        </td>
                        <td>{{$video_format->video_format_decscription}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>video_format_coding : </i></b>
                        </td>
                        <td>{{$video_format->video_format_coding}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>video_format_extension : </i></b>
                        </td>
                        <td>{{$video_format->video_format_extension}}</td>
                    </tr>
                    

                        
                </tbody>
            </table>
        </div>
    </body>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
