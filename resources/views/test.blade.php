@extends('master')
@section('content')
<textarea cols="80" rows="10" id="ckeExample">
  This is not
</textarea>
  <input type="button" onclick="javascript:fnConsolePrint();" value="Console" /><br/>
  <textarea cols="80" rows="10" id="cke">
  This is not
</textarea>
 <!-- <input type="button" onclick="javascript:fnConsolePrint();" value="Console" />-->
@endsection

@section('page-level-css')
    
    


@endsection

@section('page-level-scripts')
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.3.2/ckeditor.js" ></script>
   <script type="text/javascript">
   	var ckEditorID;

ckEditorID = 'ckeExample';

function fnConsolePrint()
{
  //console.log($('#' + ckEditorID).val());
  console.log(CKEDITOR.instances[ckEditorID].getData());
}
CKEDITOR.config.forcePasteAsPlainText = true;
CKEDITOR.replace( ckEditorID,
    {
        toolbar :
        [
          {
            items : [ 'Bold','Italic','Underline','Strike','-','RemoveFormat' ]
          },
          {
            items : [ 'Format']
          },
          {
            items : [ 'Link','Unlink' ]
          },
          {
            items : [ 'Indent','Outdent','-','BulletedList','NumberedList']
          },
          {
            items : [ 'Undo','Redo']
          }
        ]
    })
   </script>
   <script type="text/javascript">
   	var ckEditor;

ckEditor = 'cke';

function fnConsolePrint()
{
  //console.log($('#' + ckEditorID).val());
  console.log(CKEDITOR.instances[ckEditor].getData());
}
CKEDITOR.config.forcePasteAsPlainText = true;
CKEDITOR.replace( ckEditor,
    {
        toolbar :
        [
          {
            items : [ 'Bold','Italic','Underline','Strike','-','RemoveFormat' ]
          },
          {
            items : [ 'Format']
          },
          {
            items : [ 'Link','Unlink' ]
          },
          {
            items : [ 'Indent','Outdent','-','BulletedList','NumberedList']
          },
          {
            items : [ 'Undo','Redo']
          }
        ]
    })
   </script>
  
@endsection

@section('scripts')

@endsection