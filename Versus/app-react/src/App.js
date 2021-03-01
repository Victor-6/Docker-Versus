import  React from "react";
import "./App.css";
import { BrowserRouter as Router, Route } from "react-router-dom";
import Accueil from "./Components/Accueil/Accueil.js";
import Connexion from "./Components/Registration/Connexion.js";

const App = () => {
  return (
    <div>
      <Router>
        <Route path="/" component={Accueil} />
        <Route path="/connexion" component={Connexion} />
      </Router>
    </div>
  )
}

export default App