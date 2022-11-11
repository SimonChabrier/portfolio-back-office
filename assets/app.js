// Css
import './styles/app.css';

// start the Stimulus application
//import './bootstrap';

// import React
import React from 'react';
// import ReactDOM and create a root element
import { createRoot } from 'react-dom/client';

// Mon composant React
import App from './components/App';

// Création de l'élément racine et insertion dans le DOM du coposant App
const container = document.getElementById('root');
const root = createRoot(container);
root.render(<App />);

