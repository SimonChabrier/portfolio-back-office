import './style.scss';
import React from "react";

import { BrowserRouter as Router } from "react-router-dom"

const Nav = () => {
    return (
        <Router>
            <section className="nav">
                <nav className="navContent">
                    <button className="navButton" type="button"><a href="/">Home</a></button>
                    <button className="navButton" type="button"><a href="/login">Login</a></button>
                    <button className="navButton" type="button"><a href="/login">Logout</a></button>
                    <button className="navButton" type="button"><a href="/register">Register</a></button>
                </nav>
            </section>
        </Router>
    );
  }

  export default Nav;