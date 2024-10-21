import PhotoSwipeLightbox from "photoswipe/lightbox";
import "photoswipe/style.css";

const lightboxProduct = new PhotoSwipeLightbox({
  gallery: "#singleProductSlider",
  children: "a",
  pswpModule: () => import("photoswipe"),
});
lightboxProduct.init();

const lightboxProductThumbnail = new PhotoSwipeLightbox({
  gallery: "#singleProductThumbnailSlider",
  children: "a",
  pswpModule: () => import("photoswipe"),
});
lightboxProductThumbnail.init();
