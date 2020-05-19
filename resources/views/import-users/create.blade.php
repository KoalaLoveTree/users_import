<body>
<form action="{{url('users/import')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="file" name="users">
    <button type="submit">Import</button>
</form>
</body>
