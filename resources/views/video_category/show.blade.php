<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Show Video_category</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Show Video_category</h1>
            <br>
            <form method = 'get' action = '{{url("video_category")}}'>
                <button class = 'btn btn-primary'>Video_category Index</button>
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
                            <b><i>category_id : </i></b>
                        </td>
                        <td>{{$video_category->category_id}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>category_name : </i></b>
                        </td>
                        <td>{{$video_category->category_name}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>category_description : </i></b>
                        </td>
                        <td>{{$video_category->category_description}}</td>
                    </tr>
                    

                        
                </tbody>
            </table>
        </div>
    </body>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
