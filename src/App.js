import React from "react";
import {useState, useEffect} from "react";
import {LineChart,Line,XAxis,YAxis,CartesianGrid,Tooltip,Legend} from "recharts";
//import Graph from './components/Graph';



const App = () => {
    const data = [
        {
          date: "01/07",
          impression: 4000,
          click: 2400,
          amt: 2400
        },
        {
          date: "02/07",
          impression: 3000,
          click: 1398,
          amt: 2210
        },
        {
          date: "03/07",
          impression: 2000,
          click: 9800,
          amt: 2290
        },
        {
          date: "04/07",
          impression: 2780,
          click: 3908,
          amt: 2000
        },
        {
          date: "05/07",
          impression: 1890,
          click: 4800,
          amt: 2181
        },
        {
          date: "06/07",
          impression: 2390,
          click: 3800,
          amt: 2500
        },
        {
          date: "07/07",
          impression: 3490,
          click: 4300,
          amt: 2100
        }
      ];

    
    const [analisiss, setAnalisiss] = useState([]);
    const [timespan, setTimespan] = React.useState("7");

    const onChange = (event) => {
      const value = event.target.value;
      setTimespan(value);
      //console.log("testing for "+ value)
    };
    useEffect(() => {
        async function loadAnalisiss() {
            const response = await fetch('/wp-json/wp/v2/analysis?_fields=date,impression,click&per_page='+timespan+'&order=desc&orderby=date');
            if(!response.ok) {
                // oups! something went wrong
                return;
            }
            console.log("inside usefeect");
    
            const analisiss = await response.json();
            setAnalisiss(analisiss);
        }
    
        loadAnalisiss();
     }, timespan)

    return (
      <>
        <select onChange={onChange} className="form-select">
          <option defaultValue disabled>
            Select time span
          </option>
          <option value="7">last 7 days</option>
          <option value="15">Last 15 days</option>
          <option value="30">1 month</option>
        </select>
        <LineChart
        width={500}
        height={300}
        data={analisiss}
        margin={{
          top: 5,
          right: 30,
          left: 20,
          bottom: 5
        }}
      >
        <CartesianGrid strokeDasharray="3 3" />
        <XAxis dataKey="date" />
        <YAxis domain={[0, 200]} />
        <Tooltip />
        <Legend />
        <Line
          type="monotone"
          dataKey="click"
          stroke="#8884d8"
          activeDot={{ r: 8 }}
        />
        <Line type="monotone" dataKey="impression" stroke="#82ca9d" />
      </LineChart>
    </>
      );
}

export default App; 
