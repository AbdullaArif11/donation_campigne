import React from 'react';
import PropTypes from 'prop-types';
import { Link } from 'react-router-dom';

const Card = ({ card }) => {
  const { id, Picture, Title, Category, Category_bg, Card_bg, Text_button_bg } = card || {};
  const cardBg = {
    backgroundColor: `${Card_bg}`,
    color: `${Text_button_bg}`,
  }
  const categoryBg = {
    backgroundColor: `${Category_bg}`,
  }
  return (
    <>
      <Link to={`/details2/${id}`}>
        <div style={cardBg} className={`relative flex max-w-[24rem] flex-col rounded-xl bg-clip-border shadow-xl`}>
          <div className="relative m-0 overflow-hidden rounded-none rounded-t-xl bg-transparent bg-clip-border shadow-none">
            <img
              className='w-full'
              src={Picture}
              alt="ui/ux review check"
            />
          </div>
          <div className="p-6">
            <div style={categoryBg} className={` absolute px-4 py-1 font-medium text-sm text-[${Text_button_bg}] `}>
              {Category}
            </div>
            <h2 className={` mt-10 block text-xl font-semibold text-[${Text_button_bg}] `}>
              {Title}
            </h2>
          </div>
        </div>
      </Link>
    </>
  );
};

Card.propTypes = {
  card: PropTypes.object.isRequired,
};

export default Card;
