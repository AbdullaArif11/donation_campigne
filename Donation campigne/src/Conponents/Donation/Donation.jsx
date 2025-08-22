import { useLoaderData } from "react-router-dom";
import DonationRecord from "./DonationRecord";
import { useState } from "react";

const Donation = () => {
  const cards = useLoaderData();
  const donationRecords = JSON.parse(localStorage.getItem('records')) || {};
  const [isShowAll, setShowAll] = useState(false);

  const donationCount = Object.keys(donationRecords).length;

  return (
    <>
      <div className="my-10 mx-5 grid grid-cols-1 md:grid-cols-2 gap-6 justify-center">
        {isShowAll
          ? cards.map((card) => {
              if (donationRecords[card.id]) {
                return <DonationRecord key={card.id} card={card} />;
              }
              return null;
            })
          : cards.slice(0, 4).map((card) => {
              if (donationRecords[card.id]) {
                return <DonationRecord key={card.id} card={card} />;
              }
              return null;
            })}
      </div>
      {!isShowAll && donationCount > 4 && (
        <div className="flex justify-center">
          <button onClick={() => setShowAll(!isShowAll)} className="btn bg-green-600 text-white border-0">
            See All
          </button>
        </div>
      )}
    </>
  );
};

export default Donation;
