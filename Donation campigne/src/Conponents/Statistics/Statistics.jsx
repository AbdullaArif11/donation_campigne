import React, { useState, useEffect } from 'react';
import { useLoaderData } from 'react-router-dom';
import { PieChart, Pie, Cell, ResponsiveContainer } from 'recharts';

const Statistics = () => {
  const cards = useLoaderData();
  const donationRecords = JSON.parse(localStorage.getItem('records')) || [];

  // State for storing total donations per category
  const [totalDonations, setTotalDonations] = useState([]);

  // State for storing last 10 donations
  const [lastTenDonations, setLastTenDonations] = useState([]);

  // Fetch total donations data from PHP endpoint
  useEffect(() => {
    fetch("http://localhost/Web%20Technology/Donation%20campigne/src/Conponents/Statistics/get_total_donations.php")
      .then(response => response.json())
      .then(data => {
        console.log("Fetched total donations:", data); // Log fetched data
        if (data.status === "success") {
          setTotalDonations(data.data);
        } else {
          console.error("Failed to fetch total donations:", data.message);
        }
      })
      .catch(error => {
        console.error("Failed to fetch total donations:", error);
      });
  }, []);

  // Fetch last 10 donations from DonationRecords table
  useEffect(() => {
    fetch("http://localhost/Web%20Technology/Donation%20campigne/src/Conponents/Statistics/get_last_ten_donations.php")
      .then(response => response.json())
      .then(data => {
        console.log("Fetched last 10 donations:", data); // Log fetched data
        if (data.status === "success") {
          setLastTenDonations(data.data);
        } else {
          console.error("Failed to fetch last 10 donations:", data.message);
        }
      })
      .catch(error => {
        console.error("Failed to fetch last 10 donations:", error);
      });
  }, []);

  // Prepare data for the user donation pie chart
  const userData = cards.map((card) => ({
    name: card.Category,
    value: donationRecords[card.id] || 0,
  }));

  // Prepare data for the total donations pie chart
  const totalData = totalDonations.map((item) => ({
    name1: item.Category,
    value1: item.TotalDonation,
  }));

  console.log("Prepared totalData for pie chart:", totalData); // Log prepared data

  // Prepare data for the last 10 donations
  const lastTenData = lastTenDonations.map((donation, index) => ({
    id: donation.rid, // Use rid from the table
    category: donation.Category,
    title: donation.Title,
    donationAmount: donation.Donation,
    donationTime: new Date(donation.DonationTime).toLocaleString(), // Format date and time
  }));

  // Generate colors dynamically based on the number of categories
  const generateColors = (numColors) => {
    const palette = [
      "#FF0000", // Coral Red
      "#0000FF", // Blue
      "#008000", // Green
      "#FFFF00", // Yellow
      "#FFA500", // Orange
      "#800080", // Purple
      "#FFC0CB", // Pink
      "#000000", // Black
      "#FFFFFF", // White
      "#808080", // Gray
      "#40E0D0", // Turquoise
      "#FF00FF"  // Magenta
    ];
  
    const colors = [];
    for (let i = 0; i < numColors; i++) {
      colors.push(palette[i % palette.length]);
    }
    return colors;
  };

  const COLORS = generateColors(userData.length);

  const RADIAN = Math.PI / 180;
  const renderCustomizedLabel = ({ cx, cy, midAngle, innerRadius, outerRadius, percent, index }) => {
    const radius = innerRadius + (outerRadius - innerRadius) * 0.5;
    const x = cx + radius * Math.cos(-midAngle * RADIAN);
    const y = cy + radius * Math.sin(-midAngle * RADIAN);

    return (
      <text x={x} y={y} fill="white" textAnchor={x > cx ? 'start' : 'end'} dominantBaseline="central">
        {`${(percent * 100).toFixed(0)}%`}
      </text>
    );
  };

  return (
    <>
      <div className="mb-8 rounded-xl bg-clip-border shadow-xl p-36">
        <h2 className="text-2xl font-semibold mb-4">User Donations</h2>
        <ResponsiveContainer width="100%" height={500}>
          <PieChart width={500} height={500}>
            <Pie
              data={userData}
              cx="50%"
              cy="50%"
              labelLine={false}
              label={renderCustomizedLabel}
              outerRadius={150}
              fill="#8884d8"
              dataKey="value"
            >
              {userData.map((entry, index) => (
                <Cell key={`cell-${index}`} fill={COLORS[index]} />
              ))}
            </Pie>
          </PieChart>
        </ResponsiveContainer>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4 justify-between">
          {userData.filter(entry => entry.value > 0).map((entry, index) => (
            <div key={`legend-${index}`} className="flex items-center justify-center mx-2">
              <div className="w-4 h-4" style={{ backgroundColor: COLORS[index] }}></div>
              <p className="ml-2 text-[#0B0B0B] text-lg">{entry.name}: {entry.value}$</p>
            </div>
          ))}
        </div>
      </div>

      <div className="mb-8">
        <h2 className="text-2xl font-semibold mb-4">Total Donations</h2>
        <ResponsiveContainer width="100%" height={500}>
          <PieChart width={500} height={500}>
            <Pie
              data={totalData}
              cx="50%"
              cy="50%"
              labelLine={false}
              label={renderCustomizedLabel}
              outerRadius={150}
              fill="#8884d8"
              dataKey="value1"
            >
              {totalData.map((entry, index) => (
                <Cell key={`cell-total-${index}`} fill={COLORS[index]} />
              ))}
            </Pie>
          </PieChart>
        </ResponsiveContainer>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4 justify-center">
          {totalData.map((entry, index) => (
            <div key={`legend-total-${index}`} className="flex items-center justify-center mx-2">
              <div className="w-4 h-4" style={{ backgroundColor: COLORS[index] }}></div>
              <p className="ml-2 text-[#0B0B0B] text-lg">{entry.name1}</p>
            </div>
          ))}
        </div>
      </div>

      <div className="mb-8 mt-16">
        <h2 className="text-2xl font-semibold mb-4">Recent Donations</h2>
        <div className="grid grid-cols-1 gap-4 mt-4">
          {lastTenData.map((donation) => (
            <div key={`donation-${donation.id}`} className="flex justify-between p-4 lg:px-6  border border-gray-300 rounded-lg">
              <div>
                <h3 className="text-lg font-semibold">{donation.title}</h3>
                <p className="text-sm text-gray-600">Category: {donation.category}</p>
              </div>
              <div className='text-right'>
              <p className="text-lg ">Amount: ${donation.donationAmount}</p>
              <p className="text-sm text-gray-600">Date and Time: {donation.donationTime}</p> {/* Display date and time */}
              </div>
            </div>
          ))}
        </div>
      </div>
    </>
  );
};

export default Statistics;
