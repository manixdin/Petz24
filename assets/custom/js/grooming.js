function showPackage(packageName) {
    // Hide all packages
    document.getElementById('basic').style.display = 'none';
    document.getElementById('full').style.display = 'none';

    // Remove active class from all tabs
    var tabs = document.getElementsByClassName('tab-link');
    for (var i = 0; i < tabs.length; i++) {
      tabs[i].classList.remove('active');
    }

    // Show selected package and add active class to the clicked tab
    document.getElementById(packageName).style.display = 'flex';
    event.target.classList.add('active');
  }

  function showPackage(packageType) {
    const basicPackage = document.getElementById('basic');
    const fullPackage = document.getElementById('full');
    const tabs = document.querySelectorAll('.tab-link');
    
    if (packageType === 'basic') {
      basicPackage.style.display = 'flex';
      fullPackage.style.display = 'none';
      tabs[0].classList.add('active');
      tabs[1].classList.remove('active');
    } else {
      basicPackage.style.display = 'none';
      fullPackage.style.display = 'flex';
      tabs[1].classList.add('active');
      tabs[0].classList.remove('active');
    }
  }
  
  