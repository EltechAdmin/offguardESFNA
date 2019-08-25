<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>ethimoX</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' type='text/css' href='css/designs.css'/>
  <link rel='stylesheet' type='text/css' href='css/orders.css'/>
  <link rel='stylesheet' type='text/css' href='css/sections.css'/>
  <link rel='stylesheet' type='text/css' href='css/bootstrap.css'/>
    <script src='https://unpkg.com/shufflejs@5'></script>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
     <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"> -->
      <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>
       <link rel="icon" href="https://ethimox.s3.us-east-2.amazonaws.com/ethimoX-03+(1).png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Dosis:700" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">


  <!-- TODO: Missing CoffeeScript 2 -->

  <script type="text/javascript">
function myFunction() {
document.getElementById("Popular").click();
}

    window.onload=function(){
      document.getElementById("Popular").click();

    }
    function div_hide(){
    var element = document.getElementById("update");
element.parentNode.removeChild(element);
}



function imageView(url) {

///console.log(url.src)

  var content = document.getElementById("body");

          //create a div for inputs 2
  var top_div = document.createElement('div');
  top_div.id = "update";
  top_div.className= "abc";
  content.appendChild(top_div);

            //create a div for inputs 
  var sec_div = document.createElement('div');
  sec_div.className= "popupContact";
  top_div.appendChild(sec_div);
     //create a div for inputs 
  var input_names = document.createElement('div');
  input_names.className= "QRform";
  sec_div.appendChild(input_names);

     //create a div for inputs 
  var input_pic = document.createElement('img');
  input_pic.src = url.src;
  input_pic.style.backgroundImage = 'url('+ url.src +')';
  input_pic.className= "imgcss";
  input_pic.onclick=function(){
          div_hide()
}
  input_names.appendChild(input_pic);

var ge_icon = document.createElement('img');
        ge_icon.src = 'img/close.png';
        ge_icon.className = "closeX";
     //   ge_icon.S_PK = objAtr_sign.S_PK;
        ge_icon.onclick=function(){
          div_hide()
}
input_names.appendChild(ge_icon);


  var addQrsTopDiv = document.createElement('div');
  addQrsTopDiv.className= "addQrsTopDiv";
  input_names.appendChild(addQrsTopDiv);


     //create a div for inputs 
  var input_name = document.createElement('div');
  addQrsTopDiv.appendChild(input_name);

/*  //button to create a new sign
  var searchFI = document.createElement('div');
  searchFI.className='but_add';
  searchFI.id = "searchFI";
  searchFI.appendChild(document.createTextNode('Select'))
  searchFI.onclick=function(){

console.log(url.id)
div_hide();
  }  ///onclick func end
  input_name.appendChild(searchFI);
*/


}

var Shuffle = window.Shuffle;

class Demo {
  constructor(element) {
    this.element = element;
    this.shuffle = new Shuffle(element, {
      itemSelector: '.picture-item',
      sizer: element.querySelector('.my-sizer-element') });


    // Log events.
    this.addShuffleEventListeners();
    this._activeFilters = [];
    this.addFilterButtons();
    this.addSorting();
    this.addSearchFilter();
  }

  /**
     * Shuffle uses the CustomEvent constructor to dispatch events. You can listen
     * for them like you normally would (with jQuery for example).
     */
  addShuffleEventListeners() {
    this.shuffle.on(Shuffle.EventType.LAYOUT, data => {
      console.log('layout. data:', data);
    });
    this.shuffle.on(Shuffle.EventType.REMOVED, data => {
      console.log('removed. data:', data);
    });
  }

  addFilterButtons() {
    const options = document.querySelector('.filter-options');
    if (!options) {
      return;
    }

    const filterButtons = Array.from(options.children);
    const onClick = this._handleFilterClick.bind(this);
    filterButtons.forEach(button => {
      button.addEventListener('click', onClick, false);
    });
  }

  _handleFilterClick(evt) {
    const btn = evt.currentTarget;
    const isActive = btn.classList.contains('active');
    const btnGroup = btn.getAttribute('data-group');

    this._removeActiveClassFromChildren(btn.parentNode);

    let filterGroup;
    if (isActive) {
      btn.classList.remove('active');
      filterGroup = Shuffle.ALL_ITEMS;
    } else {
      btn.classList.add('active');
      filterGroup = btnGroup;
    }

    this.shuffle.filter(filterGroup);
  }

  _removeActiveClassFromChildren(parent) {
    const { children } = parent;
    for (let i = children.length - 1; i >= 0; i--) {
      children[i].classList.remove('active');
    }
  }

  addSorting() {
    const buttonGroup = document.querySelector('.sort-options');
    if (!buttonGroup) {
      return;
    }
    buttonGroup.addEventListener('change', this._handleSortChange.bind(this));
  }

  _handleSortChange(evt) {
    // Add and remove `active` class from buttons.
    const buttons = Array.from(evt.currentTarget.children);
    buttons.forEach(button => {
      if (button.querySelector('input').value === evt.target.value) {
        button.classList.add('active');
      } else {
        button.classList.remove('active');
      }
    });

    // Create the sort options to give to Shuffle.
    const { value } = evt.target;
    let options = {};

    function sortByDate(element) {
      return element.getAttribute('data-created');
    }

    function sortByTitle(element) {
      return element.getAttribute('data-title').toLowerCase();
    }

    if (value === 'date-created') {
      options = {
        reverse: true,
        by: sortByDate };

    } else if (value === 'title') {
      options = {
        by: sortByTitle };

    }
    this.shuffle.sort(options);
  }

  // Advanced filtering
  addSearchFilter() {
    const searchInput = document.querySelector('.js-shuffle-search');
    if (!searchInput) {
      return;
    }
    searchInput.addEventListener('keyup', this._handleSearchKeyup.bind(this));
  }

  /**
     * Filter the shuffle instance by items with a title that matches the search input.
     * @param {Event} evt Event object.
     */
  _handleSearchKeyup(evt) {
    const searchText = evt.target.value.toLowerCase();
    this.shuffle.filter((element, shuffle) => {
      // If there is a current filter applied, ignore elements that don't match it.
      if (shuffle.group !== Shuffle.ALL_ITEMS) {
        // Get the item's groups.
        const groups = JSON.parse(element.getAttribute('data-groups'));
        const isElementInCurrentGroup = groups.indexOf(shuffle.group) !== -1;
        // Only search elements in the current group
        if (!isElementInCurrentGroup) {
          return false;
        }
      }
      const titleElement = element.querySelector('.picture-item__title');
      const titleText = titleElement.textContent.toLowerCase().trim();
      return titleText.indexOf(searchText) !== -1;
    });
  }}


document.addEventListener('DOMContentLoaded', () => {
  window.demo = new Demo(document.getElementById('grid'));
});




// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


</script>

</head>
<body id="body" onload='myFunction()'>    <!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">ethimoX</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="designs.php">Designs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="events.php">Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


  <div class="container">
  <div class="row">
    <div class="col-12@sm">
      <h1>Pick your design</h1>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-4@sm col-3@md">
      <div class="filters-group">
        <label for="filters-search-input" class="filter-label">Search</label>
        <input class="textfield filter__search js-shuffle-search" type="search" id="filters-search-input" />
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12@sm filters-group-wrap">
      <div class="filters-group">
        <p class="filter-label">Filter</p>
        <div class="btn-group filter-options">
          <button class="btn btn--primary" id='Popular' data-group="popular">Popular</button>
           <button class="btn btn--primary" data-group="africa">Africa</button>
          <button class="btn btn--primary" data-group="kids">Kids</button>
          <button class="btn btn--primary" data-group="icon">Icons</button>
          <button class="btn btn--primary" data-group="athletes">Athletes</button>
          <button class="btn btn--primary" data-group="text">Text</button>
        </div>
      </div>
      <fieldset class="filters-group">
        <legend class="filter-label">Sort</legend>
        <div class="btn-group sort-options">
          <label class="btn active">
            <input type="radio" name="sort-value" value="dom" checked /> Default
          </label>
          <label class="btn">
            <input type="radio" name="sort-value" value="title" /> Title
          </label>
         <!-- <label class="btn">
            <input type="radio" name="sort-value" value="date-created" /> Date Created
          </label>-->
        </div>
      </fieldset>
    </div>
  </div>
</div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<div class="container">
  <div id="grid" class="row my-shuffle-container">
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["text","popular"]' data-date-created="2017-04-30" data-title="Lake Walchen">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="1" src="https://ethimox.s3.us-east-2.amazonaws.com/design/antisocial.jpg" 
              alt="A deep blue lake sits in the middle of vast hills covered with evergreen trees" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Anti-Social Butterfly</a></figcaption>
          <p class="picture-item__tags hidden@xs">1</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["africa"]' data-date-created="2016-07-01" data-title="Golden Gate Bridge">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" id="2" src="https://ethimox.s3.us-east-2.amazonaws.com/design/africa6.jpg" 
          alt="Looking down over one of the pillars of the Golden Gate Bridge to the roadside and water below" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Africa</a></figcaption>
          <p class="picture-item__tags hidden@xs">2</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["popular","africa"]' data-date-created="2016-08-12" data-title="Crocodile">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="3" src="https://ethimox.s3.us-east-2.amazonaws.com/design/africa1.jpg" 
              alt="A close, profile view of a crocodile looking directly into the camera" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Africa</a></figcaption>
          <p class="picture-item__tags hidden@xs">3</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item picture-item--h2" data-groups='["africa"]' data-date-created="2016-03-07" data-title="SpaceX">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="4" src="https://ethimox.s3.us-east-2.amazonaws.com/design/africa2.jpg" 
              alt="SpaceX launches a Falcon 9 rocket from Cape Canaveral Air Force Station" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Africa</a></figcaption>
          <p class="picture-item__tags hidden@xs">4</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["africa"]' data-date-created="2016-06-09" data-title="Crossroads">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/africa3.jpg" 
              alt="A multi-level highway stack interchange in Puxi, Shanghai" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Africa</a></figcaption>
          <p class="picture-item__tags hidden@xs">5</p>
        </div>
      </div>
    </figure>
    <figure class="col-6@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["africa"]' data-date-created="2016-06-29" data-title="Milky Way">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/africa4.jpg"
          alt="Dimly lit mountains give way to a starry night showing the Milky Way" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Africa</a></figcaption>
          <p class="picture-item__tags hidden@xs">6</p>
        </div>
      </div>
    </figure>
    <figure class="col-6@xs col-8@sm col-6@md picture-item picture-item--h2" data-groups='["popular","africa"]' data-date-created="2015-11-06" data-title="Earth">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/africa5.jpg" 
              alt="NASA Satellite view of Earth" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Earth</a></figcaption>
          <p class="picture-item__tags hidden@xs">7</p>
        </div>
        <p class="picture-item__description">Credit to artist</p>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item picture-item--h2" data-groups='["africa"]' data-date-created="2015-07-23" data-title="Turtle">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/africa7.jpg" 
              alt="A close up of a turtle underwater" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Africa</a></figcaption>
          <p class="picture-item__tags hidden@xs">8</p>
        </div>
        <p class="picture-item__description">Credits to artist ....</p>
      </div>
    </figure>

    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["africa"]' data-date-created="2014-10-12" data-title="Stanley Park">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/africa8.jpg" 
              alt="Many trees stand alonside a hill which overlooks a pedestrian path, next to the ocean at Stanley Park in Vancouver, Canada" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Roots</a></figcaption>
          <p class="picture-item__tags hidden@xs">9</p>
        </div>
      </div>
    </figure>

    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["africa"]' data-date-created="2017-01-12" data-title="Astronaut Cat">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/africa.jpg" 
              alt="An intrigued cat sits in grass next to a flag planted in front of it with an astronaut space kitty sticker on beige fabric." />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Africa</a></figcaption>
          <p class="picture-item__tags hidden@xs">10</p>
        </div>
      </div>
    </figure>


<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->




<figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["icon"]' data-date-created="2017-04-30" data-title="Lake Walchen">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="1" src="https://ethimox.s3.us-east-2.amazonaws.com/design/npsts.jpg" 
              alt="A deep blue lake sits in the middle of vast hills covered with evergreen trees" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">2 Pac and Nip</a></figcaption>
          <p class="picture-item__tags hidden@xs">11</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["icon"]' data-date-created="2016-07-01" data-title="Golden Gate Bridge">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" id="2" src="https://ethimox.s3.us-east-2.amazonaws.com/design/hailes.jpg" 
          alt="Looking down over one of the pillars of the Golden Gate Bridge to the roadside and water below" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Haile Selassie</a></figcaption>
          <p class="picture-item__tags hidden@xs">12</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["icon"]' data-date-created="2016-08-12" data-title="Crocodile">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="3" src="https://ethimox.s3.us-east-2.amazonaws.com/design/lh2.jpg" 
              alt="A close, profile view of a crocodile looking directly into the camera" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Lauryn Hill</a></figcaption>
          <p class="picture-item__tags hidden@xs">13</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item picture-item--h2" data-groups='["icon"]' data-date-created="2016-03-07" data-title="SpaceX">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="4" src="https://ethimox.s3.us-east-2.amazonaws.com/design/lh3.jpg" 
              alt="SpaceX launches a Falcon 9 rocket from Cape Canaveral Air Force Station" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Lauryn Hill</a></figcaption>
          <p class="picture-item__tags hidden@xs">14</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["popular","icon"]' data-date-created="2016-06-09" data-title="Crossroads">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/MJ.jpg"  
              alt="A multi-level highway stack interchange in Puxi, Shanghai" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Michael Jackson</a></figcaption>
          <p class="picture-item__tags hidden@xs">15</p>
        </div>
      </div>
    </figure>
    <figure class="col-6@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["icon"]' data-date-created="2016-06-29" data-title="Milky Way">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/mj3.jpg"
          alt="Dimly lit mountains give way to a starry night showing the Milky Way" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Michael Jackson</a></figcaption>
          <p class="picture-item__tags hidden@xs">16</p>
        </div>
      </div>
    </figure>


        <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["icon"]' data-date-created="2014-10-12" data-title="Stanley Park">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/n1.jpg"
              alt="Many trees stand alonside a hill which overlooks a pedestrian path, next to the ocean at Stanley Park in Vancouver, Canada" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">NIP</a></figcaption>
          <p class="picture-item__tags hidden@xs">17</p>
        </div>
          <p class="picture-item__description">Credits to artist ....</p>
      </div>
    </figure>


        <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["athletes"]' data-date-created="2014-10-12" data-title="Stanley Park">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/bibika.jpg" 
              alt="Many trees stand alonside a hill which overlooks a pedestrian path, next to the ocean at Stanley Park in Vancouver, Canada" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Shambel</a></figcaption>
          <p class="picture-item__tags hidden@xs">18</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item picture-item--h2" data-groups='["icon"]' data-date-created="2015-07-23" data-title="Turtle">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/IMG_3387.JPG" 
              alt="A close up of a turtle underwater" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">NIP</a></figcaption>
          <p class="picture-item__tags hidden@xs">19</p>
        </div>
        <p class="picture-item__description">Credits to artist ....</p>
      </div>
    </figure>

    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["popular","icon"]' data-date-created="2014-10-12" data-title="Stanley Park">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/mj.jpg" 
              alt="Many trees stand alonside a hill which overlooks a pedestrian path, next to the ocean at Stanley Park in Vancouver, Canada" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Michael Jackson</a></figcaption>
          <p class="picture-item__tags hidden@xs">20</p>
        </div>
      </div>
    </figure>

    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["icon"]' data-date-created="2017-01-12" data-title="Astronaut Cat">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/mm.jpg" 
              alt="An intrigued cat sits in grass next to a flag planted in front of it with an astronaut space kitty sticker on beige fabric." />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Marilyn Monroe</a></figcaption>
          <p class="picture-item__tags hidden@xs">21</p>
        </div>
      </div>
    </figure>








<figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["popular","icon"]' data-date-created="2017-04-30" data-title="Lake Walchen">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="1" src="https://ethimox.s3.us-east-2.amazonaws.com/design/nt.jpg" 
              alt="A deep blue lake sits in the middle of vast hills covered with evergreen trees" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">2 Pac and Nip</a></figcaption>
          <p class="picture-item__tags hidden@xs">22</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["popular","icon"]' data-date-created="2016-07-01" data-title="Golden Gate Bridge">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" id="2" src="https://ethimox.s3.us-east-2.amazonaws.com/design/marm.jpg" 
          alt="Looking down over one of the pillars of the Golden Gate Bridge to the roadside and water below" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Marilyn Monroe</a></figcaption>
          <p class="picture-item__tags hidden@xs">23</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["icon"]' data-date-created="2016-08-12" data-title="Crocodile">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="3" src="https://ethimox.s3.us-east-2.amazonaws.com/design/nph.jpg" 
              alt="A close, profile view of a crocodile looking directly into the camera" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">NIP</a></figcaption>
          <p class="picture-item__tags hidden@xs">24</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item picture-item--h2" data-groups='["icon"]' data-date-created="2016-03-07" data-title="SpaceX">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="4" src="https://ethimox.s3.us-east-2.amazonaws.com/design/ntn.jpg" 
              alt="SpaceX launches a Falcon 9 rocket from Cape Canaveral Air Force Station" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">2 Pac Biggie Nip</a></figcaption>
          <p class="picture-item__tags hidden@xs">25</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["icon"]' data-date-created="2016-06-09" data-title="Crossroads">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/nip.jpg"  
              alt="A multi-level highway stack interchange in Puxi, Shanghai" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">NIP</a></figcaption>
          <p class="picture-item__tags hidden@xs">26</p>
        </div>
      </div>
    </figure>
    <figure class="col-6@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["popular","icon"]' data-date-created="2016-06-29" data-title="Milky Way">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/ts.jpg"
          alt="Dimly lit mountains give way to a starry night showing the Milky Way" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">2 Pac</a></figcaption>
          <p class="picture-item__tags hidden@xs">27</p>
        </div>
      </div>
    </figure>


        <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["icon"]' data-date-created="2014-10-12" data-title="Stanley Park">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/nps.jpg"
              alt="Many trees stand alonside a hill which overlooks a pedestrian path, next to the ocean at Stanley Park in Vancouver, Canada" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">NIP Eritrea</a></figcaption>
          <p class="picture-item__tags hidden@xs">28</p>
        </div>
          <p class="picture-item__description">Credits to artist ....</p>
      </div>
    </figure>









<figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["icon"]' data-date-created="2017-04-30" data-title="Lake Walchen">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="1" src="https://ethimox.s3.us-east-2.amazonaws.com/design/s-l1600.jpg" 
              alt="A deep blue lake sits in the middle of vast hills covered with evergreen trees" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Bob Marley</a></figcaption>
          <p class="picture-item__tags hidden@xs">29</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["icon"]' data-date-created="2016-07-01" data-title="Golden Gate Bridge">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" id="2" src="https://ethimox.s3.us-east-2.amazonaws.com/design/marl4.jpg" 
          alt="Looking down over one of the pillars of the Golden Gate Bridge to the roadside and water below" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Bob Marley</a></figcaption>
          <p class="picture-item__tags hidden@xs">30</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["icon"]' data-date-created="2016-08-12" data-title="Crocodile">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="3" src="https://ethimox.s3.us-east-2.amazonaws.com/design/mar+3.jpg" 
              alt="A close, profile view of a crocodile looking directly into the camera" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Bob Marley</a></figcaption>
          <p class="picture-item__tags hidden@xs">31</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item picture-item--h2" data-groups='["popular","icon"]' data-date-created="2016-03-07" data-title="SpaceX">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="4" src="https://ethimox.s3.us-east-2.amazonaws.com/design/marle+.jpg" 
              alt="SpaceX launches a Falcon 9 rocket from Cape Canaveral Air Force Station" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Bob Marley</a></figcaption>
          <p class="picture-item__tags hidden@xs">32</p>
        </div>
      </div>
    </figure>
    <figure class="col-6@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["popular","icon"]' data-date-created="2016-06-29" data-title="Milky Way">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/ns.jpg"
          alt="Dimly lit mountains give way to a starry night showing the Milky Way" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">2 Pac & Nip</a></figcaption>
          <p class="picture-item__tags hidden@xs">33</p>
        </div>
      </div>
    </figure>


        <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["icon"]' data-date-created="2014-10-12" data-title="Stanley Park">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/pac.jpg"
              alt="Many trees stand alonside a hill which overlooks a pedestrian path, next to the ocean at Stanley Park in Vancouver, Canada" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">2 Pac</a></figcaption>
          <p class="picture-item__tags hidden@xs">34</p>
        </div>
      </div>
    </figure>

    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["popular","icon"]' data-date-created="2016-06-09" data-title="Crossroads">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/marley+1.jpg"  
              alt="A multi-level highway stack interchange in Puxi, Shanghai" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Bob Marley</a></figcaption>
          <p class="picture-item__tags hidden@xs">35</p>
        </div>
      </div>
    </figure>


        <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["popular","icon"]' data-date-created="2014-10-12" data-title="Stanley Park">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/2pac.jpg" 
              alt="Many trees stand alonside a hill which overlooks a pedestrian path, next to the ocean at Stanley Park in Vancouver, Canada" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">2 Pac Supreme</a></figcaption>
          <p class="picture-item__tags hidden@xs">36</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item picture-item--h2" data-groups='["icon"]' data-date-created="2015-07-23" data-title="Turtle">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/nelson.jpg" 
              alt="A close up of a turtle underwater" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Nelson Mandela</a></figcaption>
          <p class="picture-item__tags hidden@xs">37</p>
        </div>
        <p class="picture-item__description">Credits to artist ....</p>
      </div>
    </figure>

    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["icon"]' data-date-created="2014-10-12" data-title="Stanley Park">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/crop.php12.jpg" 
              alt="Many trees stand alonside a hill which overlooks a pedestrian path, next to the ocean at Stanley Park in Vancouver, Canada" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">2 Pac</a></figcaption>
          <p class="picture-item__tags hidden@xs">38</p>
        </div>
      </div>
    </figure>

    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["icon"]' data-date-created="2017-01-12" data-title="Astronaut Cat">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/haile.png" 
              alt="An intrigued cat sits in grass next to a flag planted in front of it with an astronaut space kitty sticker on beige fabric." />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Haile Selassie</a></figcaption>
          <p class="picture-item__tags hidden@xs">39</p>
        </div>
      </div>
    </figure>



<figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["icon"]' data-date-created="2017-04-30" data-title="Lake Walchen">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="1" src="https://ethimox.s3.us-east-2.amazonaws.com/design/tu.jpg" 
              alt="A deep blue lake sits in the middle of vast hills covered with evergreen trees" />
          </div>  
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">2 Pac and Nip</a></figcaption>
          <p class="picture-item__tags hidden@xs">40</p>
        </div>
      </div>
    </figure>


    <figure class="col-3@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["icon"]' data-date-created="2016-07-01" data-title="Golden Gate Bridge">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" id="2" src="https://ethimox.s3.us-east-2.amazonaws.com/design/n2.jpg"
          alt="Looking down over one of the pillars of the Golden Gate Bridge to the roadside and water below" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">NIP</a></figcaption>
          <p class="picture-item__tags hidden@xs">41</p>
        </div>
      </div>
    </figure>
<!--

    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["icon"]' data-date-created="2016-08-12" data-title="Crocodile">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="3" src="https://ethimox.s3.us-east-2.amazonaws.com/design/nph.jpg" 
              alt="A close, profile view of a crocodile looking directly into the camera" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">NIP</a></figcaption>
          <p class="picture-item__tags hidden@xs">24</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item picture-item--h2" data-groups='["icon"]' data-date-created="2016-03-07" data-title="SpaceX">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="4" src="https://ethimox.s3.us-east-2.amazonaws.com/design/ntn.jpg" 
              alt="SpaceX launches a Falcon 9 rocket from Cape Canaveral Air Force Station" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">2 Pac Biggie Nip</a></figcaption>
          <p class="picture-item__tags hidden@xs">25</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["icon"]' data-date-created="2016-06-09" data-title="Crossroads">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/nip.jpg"  
              alt="A multi-level highway stack interchange in Puxi, Shanghai" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">NIP</a></figcaption>
          <p class="picture-item__tags hidden@xs">26</p>
        </div>
      </div>
    </figure>
    <figure class="col-6@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["icon"]' data-date-created="2016-06-29" data-title="Milky Way">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/ts.jpg"
          alt="Dimly lit mountains give way to a starry night showing the Milky Way" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">2 Pac</a></figcaption>
          <p class="picture-item__tags hidden@xs">27</p>
        </div>
      </div>
    </figure>


        <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["icon"]' data-date-created="2014-10-12" data-title="Stanley Park">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/nps.jpg"
              alt="Many trees stand alonside a hill which overlooks a pedestrian path, next to the ocean at Stanley Park in Vancouver, Canada" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">NIP Eritrea</a></figcaption>
          <p class="picture-item__tags hidden@xs">28</p>
        </div>
          <p class="picture-item__description">Credits to artist ....</p>
      </div>
    </figure>
-->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->





 <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["athletes"]' data-date-created="2017-04-30" data-title="Lake Walchen">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="1" src="https://ethimox.s3.us-east-2.amazonaws.com/design/al.jpg" 
              alt="A deep blue lake sits in the middle of vast hills covered with evergreen trees" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Allen Iverson</a></figcaption>
          <p class="picture-item__tags hidden@xs">42</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["athletes"]' data-date-created="2016-07-01" data-title="Golden Gate Bridge">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" id="2" src="https://ethimox.s3.us-east-2.amazonaws.com/design/kb1.jpg" 
          alt="Looking down over one of the pillars of the Golden Gate Bridge to the roadside and water below" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Kobe</a></figcaption>
          <p class="picture-item__tags hidden@xs">43</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["athletes"]' data-date-created="2016-08-12" data-title="Crocodile">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="3" src="https://ethimox.s3.us-east-2.amazonaws.com/design/lb3.jpg" 
              alt="A close, profile view of a crocodile looking directly into the camera" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">LeBron James</a></figcaption>
          <p class="picture-item__tags hidden@xs">44</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item picture-item--h2" data-groups='["athletes"]' data-date-created="2016-03-07" data-title="SpaceX">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="4" src="https://ethimox.s3.us-east-2.amazonaws.com/design/sc.jpg" 
              alt="SpaceX launches a Falcon 9 rocket from Cape Canaveral Air Force Station" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Steph Curry</a></figcaption>
          <p class="picture-item__tags hidden@xs">45</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["athletes"]' data-date-created="2016-06-09" data-title="Crossroads">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/kb.jpg" 
              alt="A multi-level highway stack interchange in Puxi, Shanghai" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Kobe</a></figcaption>
          <p class="picture-item__tags hidden@xs">46</p>
        </div>
      </div>
    </figure>
    <figure class="col-6@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["popular","athletes"]' data-date-created="2016-06-29" data-title="Milky Way">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/lebron+.jpg"
          alt="Dimly lit mountains give way to a starry night showing the Milky Way" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">King James</a></figcaption>
          <p class="picture-item__tags hidden@xs">47</p>
        </div>
      </div>
    </figure>
    <figure class="col-6@xs col-8@sm col-6@md picture-item picture-item--h2" data-groups='["athletes"]' data-date-created="2015-11-06" data-title="Earth">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/leb1.jpg" 
              alt="NASA Satellite view of Earth" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Lebron James</a></figcaption>
          <p class="picture-item__tags hidden@xs">48</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item picture-item--h2" data-groups='["athletes"]' data-date-created="2015-07-23" data-title="Turtle">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/MJ.jpg" 
              alt="A close up of a turtle underwater" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Michael jordan</a></figcaption>
          <p class="picture-item__tags hidden@xs">49</p>
        </div>
      </div>
    </figure>

    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["popular","athletes"]' data-date-created="2014-10-12" data-title="Stanley Park">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/mj3.jpg" 
              alt="Many trees stand alonside a hill which overlooks a pedestrian path, next to the ocean at Stanley Park in Vancouver, Canada" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Michael jordan</a></figcaption>
          <p class="picture-item__tags hidden@xs">50</p>
        </div>
      </div>
    </figure>




<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->




  <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["kids"]' data-date-created="2017-04-30" data-title="Lake Walchen">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="1" src="https://ethimox.s3.us-east-2.amazonaws.com/design/140623-fallon-lion-king-tease_iunows.webp" 
              alt="A deep blue lake sits in the middle of vast hills covered with evergreen trees" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Lion King</a></figcaption>
          <p class="picture-item__tags hidden@xs">51</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["popular","kids"]' data-date-created="2016-07-01" data-title="Golden Gate Bridge">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" id="2" src="https://ethimox.s3.us-east-2.amazonaws.com/design/ogohfshrhptfb13ngwyn.webp" 
          alt="Looking down over one of the pillars of the Golden Gate Bridge to the roadside and water below" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Simba</a></figcaption>
          <p class="picture-item__tags hidden@xs">52</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["kids"]' data-date-created="2016-08-12" data-title="Crocodile">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="3" src="https://ethimox.s3.us-east-2.amazonaws.com/design/scooby.jpg" 
              alt="A close, profile view of a crocodile looking directly into the camera" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Scooby</a></figcaption>
          <p class="picture-item__tags hidden@xs">53</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item picture-item--h2" data-groups='["kids"]' data-date-created="2016-03-07" data-title="SpaceX">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="4" src="https://ethimox.s3.us-east-2.amazonaws.com/design/spongebob.jpg" 
              alt="SpaceX launches a Falcon 9 rocket from Cape Canaveral Air Force Station" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Sponge Bob</a></figcaption>
          <p class="picture-item__tags hidden@xs">54</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["kids"]' data-date-created="2016-06-09" data-title="Crossroads">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/shark.png" 
              alt="A multi-level highway stack interchange in Puxi, Shanghai" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Sharks</a></figcaption>
          <p class="picture-item__tags hidden@xs">55</p>
        </div>
      </div>
    </figure>
    <figure class="col-6@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["kids"]' data-date-created="2016-06-29" data-title="Milky Way">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/lionking.jpg"
          alt="Dimly lit mountains give way to a starry night showing the Milky Way" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Lion King</a></figcaption>
          <p class="picture-item__tags hidden@xs">56</p>
        </div>
      </div>
    </figure>
    <figure class="col-6@xs col-8@sm col-6@md picture-item picture-item--h2" data-groups='["kids"]' data-date-created="2015-11-06" data-title="Earth">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/disney.jpg" 
              alt="NASA Satellite view of Earth" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Disney</a></figcaption>
          <p class="picture-item__tags hidden@xs">57</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item picture-item--h2" data-groups='["popular","kids"]' data-date-created="2015-07-23" data-title="Turtle">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/cars2.jpg" 
              alt="A close up of a turtle underwater" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Cars</a></figcaption>
          <p class="picture-item__tags hidden@xs">58</p>
        </div>
      </div>
    </figure>

    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["kids"]' data-date-created="2014-10-12" data-title="Stanley Park">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/cars.jpg" 
              alt="Many trees stand alonside a hill which overlooks a pedestrian path, next to the ocean at Stanley Park in Vancouver, Canada" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Cars</a></figcaption>
          <p class="picture-item__tags hidden@xs">59</p>
        </div>
      </div>
    </figure>

    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["kids"]' data-date-created="2017-01-12" data-title="Astronaut Cat">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/cars+1.jpg" 
              alt="An intrigued cat sits in grass next to a flag planted in front of it with an astronaut space kitty sticker on beige fabric." />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Cars</a></figcaption>
          <p class="picture-item__tags hidden@xs">60</p>
        </div>
      </div>
    </figure>











<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["text"]' data-date-created="2017-04-30" data-title="Lake Walchen">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="1" src="https://ethimox.s3.us-east-2.amazonaws.com/design/346434684.jpg" 
              alt="A deep blue lake sits in the middle of vast hills covered with evergreen trees" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Text</a></figcaption>
          <p class="picture-item__tags hidden@xs">61</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["popular","text"]' data-date-created="2016-07-01" data-title="Golden Gate Bridge">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" id="2" src="https://ethimox.s3.us-east-2.amazonaws.com/design/1124371165.jpg" 
          alt="Looking down over one of the pillars of the Golden Gate Bridge to the roadside and water below" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Text</a></figcaption>
          <p class="picture-item__tags hidden@xs">62</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["text"]' data-date-created="2016-08-12" data-title="Crocodile">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="3" src="https://ethimox.s3.us-east-2.amazonaws.com/design/1967107482+(1).jpg" 
              alt="A close, profile view of a crocodile looking directly into the camera" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Text</a></figcaption>
          <p class="picture-item__tags hidden@xs">63</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item picture-item--h2" data-groups='["text"]' data-date-created="2016-03-07" data-title="SpaceX">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" id="4" src="https://ethimox.s3.us-east-2.amazonaws.com/design/1922018517.jpg" 
              alt="SpaceX launches a Falcon 9 rocket from Cape Canaveral Air Force Station" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a rel="noopener">Text</a></figcaption>
          <p class="picture-item__tags hidden@xs">64</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["text"]' data-date-created="2016-06-09" data-title="Crossroads">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/155476468.jpg" 
              alt="A multi-level highway stack interchange in Puxi, Shanghai" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Text</a></figcaption>
          <p class="picture-item__tags hidden@xs">65</p>
        </div>
      </div>
    </figure>
    <figure class="col-6@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["text"]' data-date-created="2016-06-29" data-title="Milky Way">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/1369309335.jpg"
          alt="Dimly lit mountains give way to a starry night showing the Milky Way" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a  rel="noopener">Text</a></figcaption>
          <p class="picture-item__tags hidden@xs">66</p>
        </div>
      </div>
    </figure>


<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!--
    <figure class="col-3@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["city"]' data-date-created="2017-01-19" data-title="San Francisco">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" src="https://media-public.canva.com/MADatG1_aIE/1/screen_2x.jpg" 
          alt="Pier 14 at night, looking towards downtown San Francisco's brightly lit buildings" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/h3jarbNzlOg" target="_blank" rel="noopener">San Francisco</a></figcaption>
          <p class="picture-item__tags hidden@xs">city</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["nature","city"]' data-date-created="2015-10-20" data-title="Central Park">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" value="1" src="https://media-public.canva.com/MADaAE2bhS0/1/screen_2x.jpg" 
              alt="Looking down on central park and the surrounding builds from the Rockefellar Center" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/utwYoEu9SU8" target="_blank" rel="noopener">Central Park</a></figcaption>
          <p class="picture-item__tags hidden@xs">nature, city</p>
        </div>
      </div>
    </figure>

        <figure class="col-3@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["city"]' data-date-created="2017-01-19" data-title="San Francisco">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/mar+3.jpg" 
          alt="Pier 14 at night, looking towards downtown San Francisco's brightly lit buildings" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/h3jarbNzlOg" target="_blank" rel="noopener">San Francisco</a></figcaption>
          <p class="picture-item__tags hidden@xs">city</p>
        </div>
      </div>
    </figure>
    <figure class="col-3@xs col-4@sm col-3@md picture-item" data-groups='["nature","city"]' data-date-created="2015-10-20" data-title="Central Park">
      <div class="picture-item__inner">
        <div class="aspect aspect--16x9">
          <div class="aspect__inner">
            <img onclick="imageView(this);" value="1" src="https://ethimox.s3.us-east-2.amazonaws.com/design/nph.jpg" 
              alt="Looking down on central park and the surrounding builds from the Rockefellar Center" />
          </div>
        </div>
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/utwYoEu9SU8" target="_blank" rel="noopener">Central Park</a></figcaption>
          <p class="picture-item__tags hidden@xs">nature, city</p>
        </div>
      </div>
    </figure>

            <figure class="col-3@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["city"]' data-date-created="2017-01-19" data-title="San Francisco">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/marl4.jpg" 
          alt="Pier 14 at night, looking towards downtown San Francisco's brightly lit buildings" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/h3jarbNzlOg" target="_blank" rel="noopener">San Francisco</a></figcaption>
          <p class="picture-item__tags hidden@xs">city</p>
        </div>
      </div>
    </figure>

            <figure class="col-3@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["city"]' data-date-created="2017-01-19" data-title="San Francisco">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/n2.jpg" 
          alt="Pier 14 at night, looking towards downtown San Francisco's brightly lit buildings" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/h3jarbNzlOg" target="_blank" rel="noopener">San Francisco</a></figcaption>
          <p class="picture-item__tags hidden@xs">city</p>
        </div>
      </div>
    </figure>


            <figure class="col-3@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["city"]' data-date-created="2017-01-19" data-title="San Francisco">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/pac.jpg" 
          alt="Pier 14 at night, looking towards downtown San Francisco's brightly lit buildings" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/h3jarbNzlOg" target="_blank" rel="noopener">San Francisco</a></figcaption>
          <p class="picture-item__tags hidden@xs">city</p>
        </div>
      </div>
    </figure>


            <figure class="col-3@xs col-8@sm col-6@md picture-item picture-item--overlay" data-groups='["city"]' data-date-created="2017-01-19" data-title="San Francisco">
      <div class="picture-item__inner">

        <img onclick="imageView(this);" src="https://ethimox.s3.us-east-2.amazonaws.com/design/ns.jpg" 
          alt="Pier 14 at night, looking towards downtown San Francisco's brightly lit buildings" />
        <div class="picture-item__details">
          <figcaption class="picture-item__title"><a href="https://unsplash.com/photos/h3jarbNzlOg" target="_blank" rel="noopener">San Francisco</a></figcaption>
          <p class="picture-item__tags hidden@xs">city</p>
        </div>
      </div>
    </figure>
-->
    <div class="col-1@sm col-1@xs my-sizer-element"></div>
  </div>
</div>
<br>
<br>
<br>
<section class="py-5">
  <div class="container">
    <h1 class="section1">New designs coming soon</h1>
    <p class="lead">We do not own the rights to some of the designs! They belong to independent artists that are not affiliated with ethimoX</a>!</p>
  </div>
</section>

    <footer class="footer-distributed">
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
      <div class="footer-left">

  <div class="logoDiv">
        <img src="https://ethimox.s3.us-east-2.amazonaws.com/ethimoX-03+(1).png" width="65px" height="50px">
    </div>
        <p class="footer-links">
          <a href="#">Home</a>
          ·
         <!-- <a href="#">Products</a>
          ·
          <a href="#">Services</a>
          ·-->
          <a href="#">Contact</a>
          

        </p>

        <p class="footer-company-name">ethimoX &copy; 2019</p>
      </div>

      <div class="footer-center">

        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>PO BOX 55035</span> Atlanta, Ga 30308</p>
        </div>


        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:support@inlivery.com">support@ethimox.com</a></p>
        </div>

      </div>

      <div class="footer-right">

        <p class="footer-company-about">
          <span>About the company</span>
          Get any design you want on any one of our products. Good for any occasion. 
        </p>

        <div class="footer-icons">

          <a href="https://www.facebook.com/ethimox"><i class="fa fa-facebook"></i></a>
          <a href="https://www.instagram.com/ethimox/"><i class="fa fa-instagram"></i></a>
         <!-- <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-pinterest"></i></a>-->
          

        </div>

      </div>

    </footer>
</body>
</html>
