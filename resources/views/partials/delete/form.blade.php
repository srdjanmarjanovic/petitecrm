<form method="POST" action="#" id="delete-form">
    <input name="_method" type="hidden" value="DELETE">
    <input type="hidden" name="backpath" value="{{ $backpath }}"/>
    {{ Form::token() }}
</form>