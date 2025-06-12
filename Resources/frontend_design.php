import { useState } from 'react';
import { 
  BarChart, Bell, Home, Users, QrCode, Calendar, 
  ChevronLeft, ChevronRight, Settings, Sun, CloudRain, 
  Wind, Thermometer
} from 'lucide-react';

export default function NeumorphicEventDashboard() {
  const [activeTab, setActiveTab] = useState('Home');

  return (
    <div className="flex items-center justify-center min-h-screen bg-cyan-700/20 p-4">
      <div className="grid grid-cols-1 lg:grid-cols-3 gap-6 max-w-6xl w-full">
        {/* Main Dashboard Column */}
        <div className="lg:col-span-2 flex flex-col gap-6">
          {/* Home Card */}
          <div className="bg-gray-100 rounded-3xl p-6 shadow-lg relative overflow-hidden">
            {/* Header */}
            <div className="flex justify-between items-center mb-4">
              <h2 className="text-2xl font-bold text-gray-700">Home</h2>
              <div className="flex items-center">
                <span className="text-gray-600 mr-2">Hr:60m</span>
                <div className="bg-gray-600 rounded-full w-8 h-8 flex items-center justify-center text-white">
                  <Bell size={16} />
                </div>
              </div>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
              {/* User Profile Circle */}
              <div className="bg-gray-800 rounded-3xl p-6 text-white relative overflow-hidden shadow-lg">
                <div className="flex justify-between">
                  <div className="w-8 h-8 rounded-full flex items-center justify-center">
                    <div className="bg-gray-700 w-6 h-6 rounded-full flex items-center justify-center">
                      <span className="text-white">🎤</span>
                    </div>
                  </div>
                  <div className="w-8 h-8 rounded-full flex items-center justify-center">
                    <div className="bg-gray-700 w-6 h-6 rounded-full flex items-center justify-center">
                      <span className="text-white">🎤</span>
                    </div>
                  </div>
                </div>
                
                {/* Circular progress */}
                <div className="flex items-center justify-center py-6 relative">
                  <div className="relative w-32 h-32 flex items-center justify-center">
                    {/* Background circle */}
                    <div className="absolute inset-0 rounded-full border-4 border-gray-700"></div>
                    
                    {/* Gradient progress arc */}
                    <svg className="absolute inset-0" viewBox="0 0 100 100">
                      <circle 
                        cx="50" cy="50" r="46" fill="none" 
                        stroke="url(#circleGradient)" 
                        strokeWidth="4"
                        strokeDasharray="289"
                        strokeDashoffset="80"
                        strokeLinecap="round"
                      />
                      <defs>
                        <linearGradient id="circleGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                          <stop offset="0%" stopColor="#FF9500" />
                          <stop offset="100%" stopColor="#FF5E3A" />
                        </linearGradient>
                      </defs>
                    </svg>
                    
                    {/* Progress dots */}
                    <svg className="absolute inset-0" viewBox="0 0 100 100">
                      <circle cx="50" cy="4" r="2" fill="white" />
                      <circle cx="85" cy="30" r="2" fill="white" />
                      <circle cx="30" cy="15" r="1" fill="white" opacity="0.5" />
                      <circle cx="70" cy="85" r="1" fill="white" opacity="0.5" />
                      <circle cx="20" cy="60" r="1" fill="white" opacity="0.7" />
                    </svg>
                    
                    {/* User icon */}
                    <div className="w-20 h-20 bg-gray-700 rounded-full flex items-center justify-center">
                      <svg viewBox="0 0 24 24" className="w-12 h-12 text-white" fill="none" stroke="currentColor" strokeWidth="1.5">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                      </svg>
                    </div>
                  </div>
                </div>
                
                {/* Bottom controls */}
                <div className="flex justify-between items-center">
                  <div className="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center">
                    <Settings size={16} className="text-gray-400" />
                  </div>
                  <div className="flex items-center">
                    <div className="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center mr-2">
                      <span className="text-xs text-white font-bold">09</span>
                    </div>
                    <span className="text-gray-400 text-sm">Find Event</span>
                  </div>
                </div>
              </div>
              
              {/* Stats Cards */}
              <div className="bg-white rounded-3xl p-4 shadow-md md:col-span-2">
                {/* Tabs */}
                <div className="flex justify-between mb-4">
                  <div className="bg-gray-300 rounded-full px-6 py-2 text-gray-700">Hours</div>
                  <div className="bg-gray-800 rounded-full px-6 py-2 text-white">Weeks</div>
                  <div className="bg-gray-300 rounded-full px-6 py-2 text-gray-700">Books</div>
                </div>
                
                {/* Statistics Grid */}
                <div className="grid grid-cols-3 gap-2">
                  <div className="text-center">
                    <p className="text-xs text-gray-600">Scanned</p>
                    <h3 className="text-4xl font-bold text-gray-800">82</h3>
                    <p className="text-xs text-gray-600">Guests</p>
                  </div>
                  <div className="text-center">
                    <p className="text-xs text-gray-600">Missed</p>
                    <h3 className="text-4xl font-bold text-gray-800">06</h3>
                    <p className="text-xs text-gray-600">Meeting</p>
                    <div className="flex justify-center mt-1">
                      <ChevronRight size={16} className="text-blue-500" />
                    </div>
                  </div>
                  <div className="text-center">
                    <p className="text-xs text-gray-600">attending</p>
                    <h3 className="text-4xl font-bold text-gray-800">201</h3>
                    <p className="text-xs text-gray-600">Booking</p>
                    <div className="flex justify-center mt-1">
                      <ChevronRight size={16} className="text-blue-500" />
                    </div>
                  </div>
                </div>
                
                {/* Second Row */}
                <div className="grid grid-cols-3 gap-2 mt-4">
                  <div className="text-center">
                    <p className="text-xs text-gray-600">Invited</p>
                    <h3 className="text-4xl font-bold text-gray-800">06</h3>
                  </div>
                  <div className="text-center">
                    <p className="text-xs text-gray-600">Confirmed</p>
                    <h3 className="text-4xl font-bold text-gray-800">159</h3>
                  </div>
                  <div className="text-center">
                    <p className="text-xs text-gray-600">Confirmed</p>
                    <h3 className="text-4xl font-bold text-gray-800">209</h3>
                  </div>
                </div>
              </div>
            </div>
            
            {/* Stats Rows */}
            <div className="mt-6">
              <div className="border-l-4 border-gray-300 pl-4 mt-2">
                <div className="flex justify-between items-center bg-white rounded-lg p-2 mb-2">
                  <span className="text-gray-700">Total Guests</span>
                  <div className="flex items-center">
                    <span className="mr-4 text-gray-700">1 Apr</span>
                    <span className="mr-2 text-gray-700">21066</span>
                    <span className="bg-gray-200 rounded-lg px-2 py-1 text-xs text-gray-700">↓3%</span>
                  </div>
                </div>
                <div className="flex justify-between items-center bg-white rounded-lg p-2">
                  <span className="text-gray-700">Average Qty. Scanned</span>
                  <div className="flex items-center">
                    <span className="mr-4 text-gray-700">1 Apr</span>
                    <span className="mr-2 text-gray-700">88206</span>
                    <span className="bg-gray-200 rounded-lg px-2 py-1 text-xs text-gray-700">↑770</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          {/* Overview Card */}
          <div className="bg-white rounded-3xl p-6 shadow-lg">
            <h2 className="text-xl font-bold text-gray-700 mb-4">Overview</h2>
            <div className="flex items-center mb-6">
              <div className="bg-gray-800 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                <svg viewBox="0 0 24 24" className="w-6 h-6 text-white" fill="none" stroke="currentColor" strokeWidth="1.5">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
              </div>
              <div>
                <h3 className="font-medium text-gray-700">Guest</h3>
                <p className="text-gray-500 text-sm">Scanned</p>
              </div>
            </div>
            
            {/* Bar Chart */}
            <div className="bg-white rounded-lg p-2 h-32">
              <div className="flex h-full items-end justify-between">
                {[...Array(24)].map((_, i) => (
                  <div key={i} className="w-2 bg-gray-700 rounded-sm" style={{ height: `${Math.random() * 70 + 20}%` }}></div>
                ))}
              </div>
            </div>
          </div>
          
          {/* Templates Card */}
          <div className="bg-white rounded-3xl p-6 shadow-lg">
            <div className="flex justify-between items-center mb-4">
              <h2 className="text-xl font-bold text-gray-700">Templates</h2>
              <div className="bg-gray-600 rounded-full w-8 h-8 flex items-center justify-center text-white">
                <span className="text-sm">08</span>
              </div>
            </div>
            
            <div className="flex gap-4">
              <div className="w-1/3">
                <div className="bg-gray-100 rounded-2xl p-4 mb-2 shadow-md">
                  <QrCode size={100} className="mx-auto" />
                </div>
              </div>
              <div className="w-2/3">
                <div className="flex items-center justify-between mb-3">
                  <div className="flex items-center">
                    <div className="bg-gray-800 rounded-full w-8 h-8 flex items-center justify-center mr-2">
                      <span className="text-white text-xs">1</span>
                    </div>
                    <span className="text-gray-700">Guests</span>
                  </div>
                  <div className="flex items-center gap-2">
                    <div className="bg-gray-200 rounded-lg px-2 py-1 text-xs text-gray-700">90%</div>
                    <div className="bg-gray-200 rounded-lg px-2 py-1 text-xs text-gray-700">36</div>
                  </div>
                </div>
                
                <div className="flex items-center justify-between mb-3">
                  <div className="flex items-center">
                    <div className="bg-gray-800 rounded-full w-8 h-8 flex items-center justify-center mr-2">
                      <span className="text-white text-xs">2</span>
                    </div>
                    <span className="text-gray-700">Name</span>
                  </div>
                  <div className="flex items-center gap-2">
                    <div className="bg-gray-200 rounded-lg px-2 py-1 text-xs text-gray-700">96%</div>
                    <div className="bg-gray-200 rounded-lg px-2 py-1 text-xs text-gray-700">33</div>
                  </div>
                </div>
                
                <div className="flex items-center justify-between">
                  <div className="flex items-center">
                    <div className="bg-gray-800 rounded-full w-8 h-8 flex items-center justify-center mr-2">
                      <span className="text-white text-xs">3</span>
                    </div>
                    <span className="text-gray-700">Table</span>
                  </div>
                  <div className="flex items-center gap-2">
                    <div className="bg-gray-200 rounded-lg px-2 py-1 text-xs text-gray-700">96%</div>
                    <div className="bg-gray-200 rounded-lg px-2 py-1 text-xs text-gray-700">38</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        {/* Right Column */}
        <div className="flex flex-col gap-6">
          {/* Guest List Card */}
          <div className="bg-white rounded-3xl p-6 shadow-lg">
            <div className="flex justify-between items-center mb-4">
              <h2 className="text-xl font-bold text-gray-700">Guests List</h2>
              <div className="bg-gray-200 rounded-full w-8 h-8 flex items-center justify-center">
                <span className="text-gray-500 text-xs">+</span>
              </div>
            </div>
            
            <div className="bg-gray-100 rounded-lg p-2 text-center mb-4">
              <span className="text-black font-medium">On Generated</span>
            </div>
            
            <div className="flex justify-center mb-4">
              <img 
                src="/api/placeholder/200/150" 
                alt="Flower arrangement" 
                className="rounded-lg" 
              />
            </div>
            
            <div className="flex justify-between">
              <div className="bg-gray-200 rounded-full w-8 h-8 flex items-center justify-center">
                <ChevronLeft size={16} className="text-gray-500" />
              </div>
              <div className="bg-gray-800 rounded-lg w-12 h-12 flex items-center justify-center">
                <QrCode size={20} className="text-white" />
              </div>
              <div className="bg-gray-200 rounded-full w-8 h-8 flex items-center justify-center">
                <ChevronRight size={16} className="text-gray-500" />
              </div>
            </div>
          </div>
          
          {/* Weather Widget */}
          <div className="bg-gray-200 rounded-3xl p-4 shadow-lg">
            <div className="flex justify-between items-center">
              <Wind size={20} className="text-gray-600" />
              <Users size={20} className="text-gray-600" />
              <Cloud size={20} className="text-gray-600" />
              <Thermometer size={20} className="text-gray-600" />
              <Settings size={20} className="text-gray-600" />
            </div>
          </div>
          
          {/* Last Engaged Card */}
          <div className="bg-white rounded-3xl p-6 shadow-lg">
            <div className="flex items-center mb-4">
              <div className="bg-gray-200 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                <svg viewBox="0 0 24 24" className="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" strokeWidth="1.5">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
              </div>
              <div>
                <h3 className="font-medium text-gray-700">Last</h3>
                <p className="text-gray-500 text-sm">Engaged</p>
              </div>
            </div>
            
            <div className="flex items-center justify-between">
              <span className="text-gray-600">G</span>
              <span className="text-gray-600">S</span>
              <span className="text-gray-600">@</span>
              <span className="text-gray-600">?</span>
            </div>
          </div>
          
          {/* QR Code Card */}
          <div className="bg-white rounded-3xl p-6 shadow-lg">
            <h2 className="text-xl font-bold text-gray-700 mb-4">QR Code</h2>
            <div className="flex justify-center">
              <QrCode size={120} className="mb-2" />
            </div>
          </div>
          
          {/* Phone Display Card */}
          <div className="bg-white rounded-3xl p-6 shadow-lg flex flex-col items-center">
            <div className="border border-gray-300 rounded-3xl w-32 h-56 flex flex-col items-center py-6 px-4 shadow-sm">
              <div className="flex justify-between items-center w-full">
                <ChevronLeft size={12} className="text-gray-500" />
                <span className="text-xs text-gray-700">Guest</span>
                <ChevronRight size={12} className="text-gray-500" />
              </div>
              
              <div className="my-4">
                <QrCode size={80} />
              </div>
              
              <div className="text-center text-xs text-gray-500 mt-2">
                <p>Scan to</p>
                <p>record event</p>
                <p>attendance</p>
              </div>
              
              <button className="bg-gray-800 text-white text-xs rounded-full px-4 py-1 mt-4">
                Done
              </button>
            </div>
          </div>
          
          {/* Controls Card */}
          <div className="bg-white rounded-3xl p-6 shadow-lg">
            <div className="flex justify-between items-center">
              <div className="bg-gray-200 rounded-full w-8 h-8 flex items-center justify-center">
                <Home size={16} className="text-gray-600" />
              </div>
              <div className="rounded-full w-6 h-6 bg-gray-200 flex items-center justify-center">
                <div className="w-3 h-3 bg-white rounded-full"></div>
              </div>
              <div className="bg-gray-200 rounded-full w-8 h-8 flex items-center justify-center">
                <Bell size={16} className="text-gray-600" />
              </div>
            </div>
            
            <div className="mt-4">
              <div className="bg-gray-200 rounded-full h-4 mb-4">
                <div className="bg-gray-800 h-4 rounded-full w-3/4"></div>
              </div>
              
              <div className="grid grid-cols-2 gap-2 mb-4">
                <div className="bg-gray-100 rounded-lg p-2">
                  <div className="flex justify-between">
                    <span className="text-gray-700 text-sm">Coming</span>
                    <span className="text-gray-700 text-sm">0</span>
                  </div>
                </div>
                
                <div className="bg-gray-100 rounded-lg p-2">
                  <div className="flex justify-between">
                    <span className="text-gray-700 text-sm">MS</span>
                    <span className="text-gray-700 text-sm">17</span>
                  </div>
                </div>
                
                <div className="bg-gray-100 rounded-lg p-2">
                  <div className="flex justify-between">
                    <span className="text-gray-700 text-sm">Remotes</span>
                    <span className="text-gray-700 text-sm">23</span>
                  </div>
                </div>
                
                <div className="bg-gray-100 rounded-lg p-2 flex items-center justify-start">
                  <div className="bg-gray-800 rounded-lg w-6 h-6 flex items-center justify-center mr-2">
                    <span className="text-white text-xs">S</span>
                  </div>
                  <span className="text-gray-700 text-sm">Exit</span>
                </div>
              </div>
              
              <div className="grid grid-cols-5 gap-1 mb-4">
                {['Sun', 'Mon', 'Tue', 'Wed', 'Thu'].map((day, i) => (
                  <div key={i} className="bg-gray-100 rounded-md p-1 text-center">
                    <span className="text-gray-700 text-xs">{day}</span>
                  </div>
                ))}
                
                {['Fri', 'Sat', '1', '2', '3'].map((day, i) => (
                  <div key={i} className="bg-gray-100 rounded-md p-1 text-center">
                    <span className="text-gray-700 text-xs">{day}</span>
                  </div>
                ))}
              </div>
              
              <div className="flex items-center justify-between">
                <span className="text-gray-500 text-xs">Email</span>
                <div className="flex items-center">
                  <div className="rounded-lg bg-gray-200 px-2 py-1 text-xs text-gray-700 mr-1">48</div>
                  <div className="rounded-lg bg-gray-200 px-2 py-1 text-xs text-gray-700 mr-1">60</div>
                  <div className="rounded-lg bg-gray-200 px-2 py-1 text-xs text-gray-700">90</div>
                </div>
              </div>
              
              <div className="flex justify-between mt-4">
                <ChevronLeft size={20} className="text-gray-500" />
                <button className="bg-gray-800 text-white rounded-full px-6 py-2 text-sm">
                  OK
                </button>
                <ChevronRight size={20} className="text-gray-500" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

// Missing component
const Cloud = ({ size, className }) => {
  return (
    <svg 
      xmlns="http://www.w3.org/2000/svg" 
      width={size} 
      height={size} 
      viewBox="0 0 24 24" 
      fill="none" 
      stroke="currentColor" 
      strokeWidth="2" 
      strokeLinecap="round" 
      strokeLinejoin="round" 
      className={className}
    >
      <path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path>
    </svg>
  );
};