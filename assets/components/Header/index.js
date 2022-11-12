import './style.scss';

import React from 'react';
import PropTypes from 'prop-types';

const Header = ({title}) => {
  return (
    <header className="header">
      <section className='header--title'>{title}</section>
    </header>
  )
}

Header.prototype = {
  title: PropTypes.string.isRequired
}

export default Header;


