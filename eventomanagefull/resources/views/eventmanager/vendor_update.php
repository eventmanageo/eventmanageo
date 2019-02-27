@extends('layouts.header_m')

@section('content')


<div>
<form action = "/edit/<?php echo $users[0]->id; ?>" method = "post">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<table>
<tr>
<td>Name</td>
<td>
<input type = 'text' name = 'name' 
value = '<?php echo$users[0]->name; ?>'/> </td>
</tr>
<tr>
<td>Category</td>
<td>
<input type = 'text' name = 'category' 
value = '<?php echo$users[0]->category; ?>'/>
</td>
</tr>
<tr>
<td>Email</td>
<td>
<input type = 'text' name = 'email' 
value = '<?php echo$users[0]->email; ?>'/>
</td>
</tr>
<tr>
<td>Contact No</td>
<td>
<input type = 'text' name = 'contact' 
value = '<?php echo$users[0]->contact; ?>'/>
</td>
</tr>
<tr>
<td>Address</td>
<td>
<input type = 'text' name = 'address' 
value = '<?php echo$users[0]->address; ?>'/>
</td>
</tr>
<tr>
<td colspan = '2'>
<input type = 'submit' value = "Update vendors" />
</td>
</tr>
</table>
</form>

</div>




@endsection