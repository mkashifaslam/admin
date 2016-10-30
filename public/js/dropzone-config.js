// "myAwesomeDropzone" is the camelized version of the HTML element's ID
Dropzone.options.formVideo = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 300, // MB
  addRemoveLinks: 'dictCancelUploadConfirmation',
  acceptedFiles: '.mp4,.avi,.mkv',
  clickable: true
};