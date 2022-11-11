import './style.scss';

import React from 'react';
import PropTypes from 'prop-types';

const Header = ({title}) => {
  return (
    <div className='pageContent'>
    <header className="header">
      <h1>{title}</h1>
    </header>
    </div>
  )
}

Header.prototype = {
  title: PropTypes.string.isRequired
}

export default Header;


