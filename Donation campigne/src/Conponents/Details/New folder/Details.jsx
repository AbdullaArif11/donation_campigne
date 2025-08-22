import { useLoaderData, useParams } from "react-router-dom";
import swal from "sweetalert";

const Details = () => {
  const params = useParams();
  let { id } = params || {};
  const cards = useLoaderData();
  const { Title, Description, Text_button_bg, Picture } = cards[id - 1];
  const btnBg = {
    backgroundColor: `${Text_button_bg}`,
  };

  const AddDonate = (ID) => {
    swal({
      title: "Enter Donation Amount",
      content: {
        element: "input",
        attributes: {
          type: "number",
          placeholder: "Enter amount",
        },
      },
      buttons: true,
    }).then((donationAmount) => {
      if (donationAmount) {
        donationAmount = parseFloat(donationAmount);

        let records = JSON.parse(localStorage.getItem("records")) || {};
        if (!records[ID]) {
          records[ID] = 0;
        }
        records[ID] += donationAmount;
        localStorage.setItem("records", JSON.stringify(records));

        swal(
          "Successful Donation Confirmation!",
          "Thank you for your generous donation! Your contribution makes a real difference, and we deeply appreciate your support.",
          "success"
        );
      } else {
        swal("Donation Cancelled", "No donation amount entered.", "error");
      }
    });
  };

  return (
    <div className="relative p-5 md:p-10 flex max-w-max flex-col rounded-xl bg-white">
      <div className="relative m-0 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none">
        <img className="w-full" src={Picture} alt="ui/ux review check" />
        <div className="w-full bg-[#0B0B0B80] absolute bottom-0 p-[2.5%] md:p-[3.5%]">
          <button
            onClick={() => AddDonate(id)}
            style={btnBg}
            className={`btn h-14 text-white text-xl font-semibold py-3 px-6 rounded-[4px]`}
          >
            Donate
          </button>
        </div>
      </div>
      <div className="my-14">
        <h4 className="block text-4xl font-bold tracking-normal text-[#0B0B0B] antialiased">
          {Title}
        </h4>
        <p className="mt-6 block text-base font-normal text-[#0B0B0BB2] text-justify antialiased">
          {Description}
        </p>
      </div>
    </div>
  );
};

export default Details;
