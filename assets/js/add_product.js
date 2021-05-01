function deleteImage() { 
	var index = Array.from(document.getElementById('list').children).indexOf(event.target.parentNode)
  	document.querySelector("#list").removeChild( document.querySelectorAll('#list span')[index]);
    totalFiles.splice(index, 1);
    console.log(totalFiles)
}

var totalFiles = [];
function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }
      
      totalFiles.push(f)

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img width=100 class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>', "<button onclick='deleteImage()'>delete</button>"].join('');

          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }
  

  document.getElementById('files').addEventListener('change', handleFileSelect, false);