<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Show Video</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Show Video</h1>
            <br>
            <form method = 'get' action = '{{url("video")}}'>
                <button class = 'btn btn-primary'>Video Index</button>
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
                            <b><i>video_id : </i></b>
                        </td>
                        <td>{{$video->video_id}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>video_title : </i></b>
                        </td>
                        <td>{{$video->video_title}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>video_description : </i></b>
                        </td>
                        <td>{{$video->video_description}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>video_category : </i></b>
                        </td>
                        <td>{{$video->video_category}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>video_type : </i></b>
                        </td>
                        <td>{{$video->video_type}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>video_upload_date : </i></b>
                        </td>
                        <td>{{$video->video_upload_date}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>video_total_views : </i></b>
                        </td>
                        <td>{{$video->video_total_views}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>video_upload_user_id : </i></b>
                        </td>
                        <td>{{$video->video_upload_user_id}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>video_delete_date : </i></b>
                        </td>
                        <td>{{$video->video_delete_date}}</td>
                    </tr>
                    

                        
                </tbody>
            </table>
        </div>
    </body>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
