const imageFromUrl = document.querySelector(".imageFromUrl");
const previewImage = document.querySelector(".preview-image");
imageFromUrl.addEventListener("change", function () {
  if (imageFromUrl.value.match(/^http.*\.(jpeg|jpg|png)/gi) != null) {
    const image = document.createElement("img");
    image.src = imageFromUrl.value;
    image.style.maxWidth = "400px";
    previewImage.append(image);
  } else {
    previewImage.textContent = "No valid image.";
  }
});
