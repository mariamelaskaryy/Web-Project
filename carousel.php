
<body>
	

<div class="content-slider">
     <h1>Reviews</h1> 
  <div class="slider">

    <div class="mask">
      <ul>
        <li class="anim1">
          <div><img class="img-item" src="slides-images/ppl.jpg" ></div>
          <div class="quote">Excellent prices!</div>
          <div class="source">- Via</div>
        </li>
        <li class="anim2">
          <div><img class="img-item" src="slides-images/ppl2.webp" ></div>
          <div class="quote">Nice site and best deals!</div>
          <div class="source">- Dan</div>
        </li>
        <li class="anim3">
          <div><img class="img-item" src="slides-images/ppl5.jpg" ></div>
          <div class="quote">It was just unforgettable, 5 out of 5.</div>
          <div class="source">- Sara</div>
        </li>
        <li class="anim4">
          <div><img class="img-item" src="slides-images/ppl4.jpg" ></div>
          <div class="quote">Great! Helped me a lot in my wonderful journey last year. </div>
          <div class="source">- Adam</div>
        </li>
        <li class="anim5">
          <div><img class="img-item" src="slides-images/ppl3.jpg" ></div>
          <div class="quote">All the hikers are good and very helpful. </div>
          <div class="source">- John</div>
        </li>
      </ul>
    </div>
  </div>
</div>
</body>

<style type="text/css">

.img-item{
width: 100px;height:100px;
float:left;
border-radius: 50%;
}

h1 {
  text-align: center;
font-family: Arial, Helvetica, sans-serif; 
font-weight: bold;
}

.content-slider {
  width: 100%;
  height: 200px;

font-family: 'Droid Serif', serif;
padding-bottom: 30px;
}

.slider {
  height: 320px;
  width: 680px;
  margin: 40px auto 0;
  overflow: visible;
  position: relative;
}

.mask {
  overflow: hidden;
  height: 320px;
}

.slider ul {
  margin: 0;
  padding: 0;
  position: relative;
}

.slider li {
  width: 680px;
  height: 320px;
  position: absolute;
  top: -325px;
  list-style: none;
}

.slider .quote {
  font-size: 25px;
  font-style: italic;
}

.slider .source {
  font-size: 20px;
  text-align: right;
}

.slider li.anim1 {
   width:600px;
   height:150px;
  border: 1px solid  white;
  padding: 30px;
  border-radius: 20px;
  background-color: #effaf7;
  animation: cycle 15s linear infinite;

}

.slider li.anim2 {
    width:600px;
   height:150px;
  border: 1px solid  white;
  padding: 30px;
  border-radius: 25px;
  background-color: #effaf7;
  animation: cycle2 15s linear infinite;
}

.slider li.anim3 {
    width:600px;
   height:150px;
  border: 1px solid  white;
  padding: 30px;
  border-radius: 25px;
  background-color:  #effaf7;
  animation: cycle3 15s linear infinite;
}

.slider li.anim4 {
    width:600px;
   height:150px;
  border: 1px solid  white;
  padding: 30px;
  border-radius: 25px;
  background-color:  #effaf7;
  animation: cycle4 15s linear infinite;
}

.slider li.anim5 {
    width:600px;
   height:150px;
  border: 1px solid  white;
  padding: 30px;
  border-radius: 25px;
  background-color:  #effaf7;
  animation: cycle5 15s linear infinite;
}


@keyframes cycle {
  0% {
    top: 0px;
  }
  4% {
    top: 0px;
  }
  16% {
    top: 0px;
    opacity: 1;
    z-index: 0;
  }
  20% {
    top: 325px;
    opacity: 0;
    z-index: 0;
  }
  21% {
    top: -325px;
    opacity: 0;
    z-index: -1;
  }
  50% {
    top: -325px;
    opacity: 0;
    z-index: -1;
  }
  92% {
    top: -325px;
    opacity: 0;
    z-index: 0;
  }
  96% {
    top: -325px;
    opacity: 0;
  }
  100% {
    top: 0px;
    opacity: 1;
  }
}

@keyframes cycle2 {
  0% {
    top: -325px;
    opacity: 0;
  }
  16% {
    top: -325px;
    opacity: 0;
  }
  20% {
    top: 0px;
    opacity: 1;
  }
  24% {
    top: 0px;
    opacity: 1;
  }
  36% {
    top: 0px;
    opacity: 1;
    z-index: 0;
  }
  40% {
    top: 325px;
    opacity: 0;
    z-index: 0;
  }
  41% {
    top: -325px;
    opacity: 0;
    z-index: -1;
  }
  100% {
    top: -325px;
    opacity: 0;
    z-index: -1;
  }
}

@keyframes cycle3 {
  0% {
    top: -325px;
    opacity: 0;
  }
  36% {
    top: -325px;
    opacity: 0;
  }
  40% {
    top: 0px;
    opacity: 1;
  }
  44% {
    top: 0px;
    opacity: 1;
  }
  56% {
    top: 0px;
    opacity: 1;
    z-index: 0;
  }
  60% {
    top: 325px;
    opacity: 0;
    z-index: 0;
  }
  61% {
    top: -325px;
    opacity: 0;
    z-index: -1;
  }
  100% {
    top: -325px;
    opacity: 0;
    z-index: -1;
  }
}

@keyframes cycle4 {
  0% {
    top: -325px;
    opacity: 0;
  }
  56% {
    top: -325px;
    opacity: 0;
  }
  60% {
    top: 0px;
    opacity: 1;
  }
  64% {
    top: 0px;
    opacity: 1;
  }
  76% {
    top: 0px;
    opacity: 1;
    z-index: 0;
  }
  80% {
    top: 325px;
    opacity: 0;
    z-index: 0;
  }
  81% {
    top: -325px;
    opacity: 0;
    z-index: -1;
  }
  100% {
    top: -325px;
    opacity: 0;
    z-index: -1;
  }
}

@keyframes cycle5 {
  0% {
    top: -325px;
    opacity: 0;
  }
  76% {
    top: -325px;
    opacity: 0;
  }
  80% {
    top: 0px;
    opacity: 1;
  }
  84% {
    top: 0px;
    opacity: 1;
  }
  96% {
    top: 0px;
    opacity: 1;
    z-index: 0;
  }
  100% {
    top: 325px;
    opacity: 0;
    z-index: 0;
  }
}
</style>