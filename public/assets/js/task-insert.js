var fileDropArea = document.getElementById('fileDropArea');

fileDropArea.addEventListener('dragover', function(e) {
  e.preventDefault();
  fileDropArea.classList.add('bg-primary');
});

fileDropArea.addEventListener('dragleave', function(e) {
  e.preventDefault();
  fileDropArea.classList.remove('bg-primary');
});

fileDropArea.addEventListener('drop', function(e) {
  e.preventDefault();
  fileDropArea.classList.remove('bg-primary');
  var files = e.dataTransfer.files;
  // Handle dropped files here
  console.log(files);
});

