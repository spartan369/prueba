<!DOCTYPE html>
<!--LAYOUT PARA LA APP PARACELSO-->
<html>
<form action="{{ url('imagen') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input type="file" name="imagen" id="imagen">
            <button id="btnGenerar" type="submit" >Registrar</button>
</form>
</html>