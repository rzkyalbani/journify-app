const getSlug = (url) => {
  const urlArray = url.split('/');
  return urlArray[urlArray.length - 1];
}

function previewImage(currentImgId, inputId) {
  const image = document.querySelector(`#${inputId}`);
  const currentProfilePicture = document.querySelector(`#${currentImgId}`);
  const previewImage = document.querySelector('.img-preview');

  const ofReader = new FileReader();
  ofReader.readAsDataURL(image.files[0]);

  ofReader.onload = function (oFREvent) {
    previewImage.src = oFREvent.target.result;
    currentProfilePicture.classList.add('hidden');
    previewImage.classList.remove('hidden');
  }
}

document.addEventListener('trix-file-accept', function (e) {
  e.preventDefault();
})


// document.addEventListener('DOMContentLoaded', function () {
//   const likeBtn = document.getElementById('like-btn');
//   const likeSvg = document.getElementById('like-svg');

//   likeBtn.addEventListener('click', function () {
//     likeBtn.classList.add('liked');

//     if (likeBtn.classList.contains('liked')) {
//       likeSvg.setAttribute('fill', 'red');

//     } else {
//       likeSvg.setAttribute('fill', 'none');
//     }

//   });
// });
