function previewImage() {
  const image = document.querySelector('#profile_picture');
  const currentProfilePicture = document.querySelector('#current_profile_picture');
  const previewImage = document.querySelector('.img-preview');

  const ofReader = new FileReader();
  ofReader.readAsDataURL(image.files[0]);

  ofReader.onload = function(oFREvent) {
    previewImage.src = oFREvent.target.result;
    currentProfilePicture.classList.add('hidden');
    previewImage.classList.remove('hidden');
  }
}
