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

  function showPackageGrooming(packageType) {
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


  function showPackageExperience(packageType) {
    const everydayPackage = document.getElementById('everyday');
    const fullPackage = document.getElementById('full');
    const puppyPackage = document.getElementById('puppy');

    const tabs = document.querySelectorAll('.tab-link');
    
    if (packageType === 'everyday') {
      everydayPackage.style.display = 'flex';
      fullPackage.style.display = 'none';
      puppyPackage.style.display = 'none';
      tabs[0].classList.add('active');
      tabs[1].classList.remove('active');
      tabs[2].classList.remove('active');

    } else if(packageType === 'full'){
      everydayPackage.style.display = 'none';
      fullPackage.style.display = 'flex';
      puppyPackage.style.display = 'none';
      tabs[0].classList.remove('active');
      tabs[1].classList.add('active');
      tabs[2].classList.remove('active');
    }
    
    else {
      everydayPackage.style.display = 'none';
      fullPackage.style.display = 'none';
      puppyPackage.style.display = 'flex';
      tabs[0].classList.remove('active');
      tabs[1].classList.remove('active');
      tabs[2].classList.add('active');
    }
  }
  
  