<style media="screen">
    .quill-box{
      border-radius: 0.5em;
    }
    
    #editor{
      height: 130px;
    }
    </style>
    
    <link href="{{ asset('asset/lib/quill/quill.bubble.css') }}" rel="stylesheet">
    
    <div class="quill-box border bg-white p-4">
      <div class="mb-3">
        <i class="fa fa-edit"></i> Suggestion
      </div>
    
      <form method="post">
        @csrf
        <input type="hidden" name="content">
        <div id="editor" class="bg-white border ui-widget-content"></div>
        <div class="pt-3">
          <div class="d-flex align-items justify-content-between">
            <button class="btn btn-sm btn-primary" type="submit" name="register-post">Publier</button>
          </div>
        </div>
      </form>
     
    
    </div>
    
    @section('scripts')
    <script src="{{ asset('asset/lib/quill/quill.js') }}"></script>
    
    <script>
    
    var toolbarOptions = [];
    
    var options = {
      placeholder: 'Exprimez vous...',
      theme: 'bubble',
      modules: {
       toolbar: toolbarOptions
     }
    };
    
    var editor = new Quill('#editor', options);
    
    $('form').on('submit',function(e){
      e.preventDefault();
      var form = e.target
      var content = JSON.stringify(editor.getContents());
      var length = editor.getLength();
      var text = editor.getText(0, length);
      $('input[name=content]').first().val(text);
      form.submit();
    });
    
    </script>
    
    @endsection
    