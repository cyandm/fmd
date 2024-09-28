const maskWrapperGroup = document.querySelectorAll('.mask-wrapper');

function cynSetProperty(element, property, value) {
  element.style.setProperty(property, value + 'px');
}

function cynSetMaskWrapperWidthAndHeight(elem) {
  cynSetProperty(
    elem,
    '--mask-wrapper-content-height',
    elem.children[0].offsetHeight
  );

  cynSetProperty(
    elem,
    '--mask-wrapper-content-width',
    elem.children[0].offsetWidth
  );
}

maskWrapperGroup.forEach((elem) => {
  cynSetMaskWrapperWidthAndHeight(elem);

  for (const child of elem.children) {
    child.style.setProperty('position', 'absolute');
  }
});
