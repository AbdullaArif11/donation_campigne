import React, { useEffect, useState } from 'react';
import PropTypes from 'prop-types';

const DonationRecord = ({ card }) => {
  const { id, Title, Category, Category_bg, Card_bg, Text_button_bg, PictureR } = card || {};

  const [totalDonation, setTotalDonation] = useState(0);

  useEffect(() => {
    const records = JSON.parse(localStorage.getItem('records')) || {};
    if (records[id]) {
      setTotalDonation(parseFloat(records[id]));
    }
  }, [id]);

  const btnBg = {
    backgroundColor: `${Text_button_bg}`,
  };
  const cardBg = {
    backgroundColor: `${Card_bg}`,
  };
  const categoryBg = {
    backgroundColor: `${Category_bg}`,
  };
  const txtColor = {
    color: `${Text_button_bg}`,
  };

  return (
    <div>
      <div style={cardBg} className="relative flex flex-col lg:flex-row w-full max-w-[48rem] flex-row rounded-xl bg-white bg-clip-border shadow-md">
        <div className="relative m-0 lg:w-2/5 shrink-0 overflow-hidden rounded-xl lg:rounded-r-none bg-white bg-clip-border">
          <img
            src={PictureR}
            alt="image"
            className="h-full w-full object-cover"
          />
        </div>
        <div className="p-6">
          <h6 style={{ ...categoryBg, ...txtColor }} className="w-fit py-2 px-4 mb-4 block text-base font-semibold leading-relaxed tracking-normal antialiased">
            {Category}
          </h6>
          <h4 className="mb-2 block font-sans text-2xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
            {Title}
          </h4>
          <p style={txtColor} className="mb-8 block font-sans text-base font-semibold leading-relaxed text-gray-700 antialiased">Total: 
            ${totalDonation.toFixed(2)}
          </p>
          <a className="inline-block" href="#">

          </a>
        </div>
      </div>
    </div>
  );
};

DonationRecord.propTypes = {
  card: PropTypes.object.isRequired,
};

export default DonationRecord;
