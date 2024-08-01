import '../css/base/style.css';



// Our modules / classes
import MobileMenu from "./modules/MobileMenu"
// import HeroSlider from "./modules/HeroSlider"
import GoogleMap from "./modules/GoogleMap"
import Search from "./modules/Search"
import MyNotes from "./modules/myNotes"
import Like from "./modules/like"
import Notification from "./modules/notifications"

// Instantiate a new object using our modules / classes
const mobileMenu = new MobileMenu()
const googleMap = new GoogleMap()
const search = new Search()
const myNotes = new MyNotes()
const like = new Like()
const notification = new Notification()
// console.log(search);

// Allow new JS and CSS to load in browser without a traditional page refresh
if (module.hot) {
  module.hot.accept()
}