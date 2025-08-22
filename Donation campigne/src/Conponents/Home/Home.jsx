import { useLoaderData } from "react-router-dom";
import { useState } from "react";
import { Link } from 'react-router-dom';
import Banner from "../Banner/Banner";
import Cards from "../Cards/Cards";

const Home = () => {
  const [searchInput, setSearchInput] = useState('');
  const cards = useLoaderData();
  const handleSearchClick = (input) => {
    setSearchInput(input);
  };

  return (
    <>
      <Banner handleSearchClick={handleSearchClick}></Banner>
      <Cards cards={cards} searchInput={searchInput}></Cards>

      <div className="flex justify-center p-5 w-full">
      <div className="hero bg-gradient-to-br from-[#1A5319] via-[#508D4E] via-[#80AF81] to-[#D6EFD8]  max-w-4xl border-solid border-2 border-gray-200 rounded-2xl p-10 shadow-2xl text-white">
        <div className="hero-content flex-col lg:flex-row-reverse">
          <div className="text-center lg:text-left">
            <h1 className="text-4xl font-bold">JOIN US!</h1>
            <p className="mt-6">Become a part of our mission to help those in need. Your time and effort can make a significant difference in the lives of many. Join our team of volunteers and be the change you wish to see in the world.</p>
            {/* <p className="py-1">The best way to find yourself is to lose yourself in the service of others.</p> */}
          </div>
          
          <Link to={`/VolunteerRegistration`} className="card flex-shrink-0 w-full border-solid border-2 border-[#80af81] rounded-2xl max-w-sm shadow-2xl bg-transparent backdrop-blur-md hover:relative hover:translate-x-3 hover:translate-y-1">
            <div className="card-body m-0 p-0">
              <h1 className="text-center text-2xl font-bold mb-1 mt-0.5">REGISTER AS A VOLUNTEER</h1>
            </div>
            <p className="text-xs mb-1 text-center">Everybody can be great... because anybody can serve. ...</p>
          </Link>
          
        </div>
      </div>
    </div>

    </>
  );
};

export default Home;

// .hover1:hover { 
//   background: rgb(78, 76, 76);
//   position: relative;
//   line-height: 3rem;
//   transform: translatex(-25px) translateY(-5px);
//   transition: 0.4s linear;
//   box-shadow: 5px 4px 30px 0px rgba(0, 0, 0, 0.5);
// }