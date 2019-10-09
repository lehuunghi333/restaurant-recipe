
  var nav = document.getElementById('navbar');
  window.addEventListener('scroll', function(e) {
    if(window.pageYOffset > nav.offsetTop) {
      nav.classList.add('fixed-nav');
      // document.body.classList.add('fixed-body');
    }
    else {
      nav.classList.remove('fixed-nav');
      // document.body.classList.remove('fixed-body');
    }
  });