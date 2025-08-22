import Card from "./Card";

const Cards = ({cards, searchInput}) => {

  const filteredCards = searchInput
    ? cards.filter(card => card.Category.toLowerCase() === searchInput.toLowerCase())
    : cards;

  return (
    <div className="my-24 grid gap-6 md:grid-cols-2 lg:grid-cols-4 justify-center">
      {
        searchInput
          ? filteredCards?.map(card => <Card key={card.id} card={card}></Card>)
          : cards?.map(card => <Card key={card.id} card={card}></Card>)
        
      }
    </div>
  );
};

export default Cards;