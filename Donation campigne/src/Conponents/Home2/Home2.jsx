import { useLoaderData } from "react-router-dom";
import Banner from "../Banner/Banner";
import Cards from "../Cards2/Cards";
import { useState } from "react";

const Home2 = () => {
  const [searchInput, setSearchInput] = useState('');
  const cards = useLoaderData();
  const handleSearchClick = (input) => {
    setSearchInput(input);
  };

  return (
    <>
      <Banner handleSearchClick={handleSearchClick}></Banner>
      <Cards cards={cards} searchInput={searchInput}></Cards>
    </>
  );
};

export default Home2;