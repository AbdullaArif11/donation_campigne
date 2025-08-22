import React from 'react';
import bannerBackground from '../Navlogo/Banner2.jpg';
import { useState } from 'react';

const Banner = ({ handleSearchClick }) => {
  const [searchInput, setSearchInput] = useState('');
  const bannerStyle = {
    backgroundImage: `url(${bannerBackground})`,
    backgroundSize: 'cover',
    backgroundPosition: 'center',
    opacity: 0.7,
    height: '60vh'
  };

  return (
    <div style={bannerStyle} className='h-[40vh] w-full md:h-[60vh] lg:h-[80vh]'>
      <h2 className='text-center text-[#1A5319]  font-bold text-2xl md:text-4xl py-[10%] px-4'>Happiness doesn't result from what we get, but from what we give.</h2>
      <div className='flex w-4/5 mx-auto'>
        <input
          className='w-3/4 bg-white border-2'
          type="text"
          value={searchInput}
          onChange={(e) => setSearchInput(e.target.value)}
        />
        <button
          className="btn rounded-l-none bg-gradient-to-br from-[#1A5319] via-[#508D4E] via-[#80AF81] to-[#93ec99] text-white"  
          onClick={() => handleSearchClick(searchInput)}
        >
          Search
        </button>
      </div>
    </div>
  );
};

export default Banner;