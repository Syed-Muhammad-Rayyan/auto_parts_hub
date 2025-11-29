<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            // EXISTING PRODUCTS
            [
                'slug' => 'oil-filter',
                'name' => 'Bosch Oil Filter',
                'price' => 1200,
                'short' => 'High-efficiency oil filter for longer engine life.',
                'image' => 'bosch oil filter.png',
                'description' => 'Premium oil filter with high flow rate and superior filtration. Fits most compact and mid-size cars.',
                'category' => 'Engine Parts',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'brake-pads',
                'name' => 'Wagner Brake Pads',
                'price' => 3500,
                'short' => 'Durable ceramic brake pads for reliable stopping.',
                'image' => 'wagner brake pads.png',
                'description' => 'Long-lasting brake pads engineered for consistent performance and low dust.',
                'category' => 'Brake System',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'spark-plug',
                'name' => 'Spark Plug',
                'price' => 850,
                'short' => 'Reliable spark plugs for smooth ignition.',
                'image' => 'sparkplug.png',
                'description' => 'Precision spark plug with extended life and strong spark for improved combustion.',
                'category' => 'Engine Parts',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'car-battery',
                'name' => 'Platinum Car Battery',
                'price' => 9800,
                'short' => 'Durable battery with high cranking power.',
                'image' => 'platinum battery.png',
                'description' => 'Maintenance-free battery with long life and high starting power for modern vehicles.',
                'category' => 'Electrical Components',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'xtrig-shock-absorber',
                'name' => 'Xtrig Shock Absorber',
                'price' => 16500,
                'short' => 'High-performance shock absorber for superior handling.',
                'image' => 'xtrig shock absorber.png',
                'description' => 'Exceptional damping performance and stability, designed for both street and off-road.',
                'category' => 'Suspension Parts',
                'created_at' => now(),
                'updated_at' => now()
            ],
//            [
//                'slug' => 'k1-crankshaft',
//                'name' => 'K1 Technologies Crankshaft',
//                'price' => 48500,
//                'short' => 'Forged steel crankshaft for ultimate engine strength.',
//                'image' => 'K1 technologies crankshaft.png',
//                'description' => 'High durability, tensile strength, and perfect balance for high-performance engines.',
//                'category' => 'Engine Parts',
//                'created_at' => now(),
//                'updated_at' => now()
//            ],
            [
                'slug' => 'wiper-blades',
                'name' => 'Windshield Wiper Blades',
                'price' => 850,
                'short' => 'Reliable wiper blades for all-weather visibility.',
                'image' => 'windshield wiper blade.png',
                'description' => 'Durable and flexible wiper blades for streak-free clarity in rain, snow, or dust.',
                'category' => 'Lights',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'halogen-headlights',
                'name' => 'Halogen Headlights',
                'price' => 10000,
                'short' => 'Bright halogen headlights for improved road visibility.',
                'image' => 'halogen headlights.png',
                'description' => 'Crystal-clear illumination and wide beam coverage for safe night driving.',
                'category' => 'Lights',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'exedy-clutch-plates',
                'name' => 'Exedy Clutch Plates',
                'price' => 9800,
                'short' => 'Durable clutch plates for smooth and responsive shifting.',
                'image' => 'exedy clutch plate.png',
                'description' => 'Exceptional grip and longevity. Perfect for high-torque engines.',
                'category' => 'Transmission',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'fleet-coolant',
                'name' => 'Fleet Coolant',
                'price' => 1200,
                'short' => 'Heavy-duty coolant for engine protection.',
                'image' => 'fleet coolant.png',
                'description' => 'Maximum engine cooling and corrosion protection for light and heavy vehicles.',
                'category' => 'Engine Parts',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'sparco-racing-seats',
                'name' => 'Sparco Racing Seats',
                'price' => 82000,
                'short' => 'Premium racing seats for ultimate comfort and safety.',
                'image' => 'sparco racing seats.png',
                'description' => 'Ergonomic design, lightweight construction, and superior lateral support.',
                'category' => 'Body Components',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'sparco-steering-wheel',
                'name' => 'Sparco Steering Wheel',
                'price' => 18500,
                'short' => 'High-grip steering wheel for precision control.',
                'image' => 'sparco steering wheel.png',
                'description' => 'Maximum control with ergonomic grip and lightweight aluminum core.',
                'category' => 'Body Components',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'brake-calipers',
                'name' => 'Brake Calipers',
                'price' => 15000,
                'short' => 'High-performance brake calipers.',
                'image' => 'brake calipers.png',
                'description' => 'Premium calipers designed for better braking efficiency.',
                'category' => 'Brake System',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'transmission-gear',
                'name' => 'Transmission Gear',
                'price' => 25000,
                'short' => 'Durable transmission gear for smooth shifting.',
                'image' => 'transmission.png',
                'description' => 'High-quality gear to ensure efficient power transfer.',
                'category' => 'Transmission',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'michelin-tyres',
                'name' => 'Michelin Tyres',
                'price' => 12000,
                'short' => 'Premium tyres for all conditions.',
                'image' => 'michelin tyres.png',
                'description' => 'Durable tyres designed for excellent grip and long life.',
                'category' => 'Tires & Wheels',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'car-seat-normal',
                'name' => 'Standard Car Seat',
                'price' => 5500,
                'short' => 'Comfortable car seat for daily use.',
                'image' => 'car seat normal.png',
                'description' => 'Ergonomic seat design for long drives.',
                'category' => 'Body Components',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'piston',
                'name' => 'Engine Piston',
                'price' => 8000,
                'short' => 'Durable piston for engine performance.',
                'image' => 'piston.png',
                'description' => 'High-strength piston designed for optimal combustion.',
                'category' => 'Engine Parts',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'car-alternator',
                'name' => 'Car Alternator',
                'price' => 7500,
                'short' => 'Efficient alternator for stable electrical supply.',
                'image' => 'car alternator.png',
                'description' => 'High-output alternator for smooth electrical operation.',
                'category' => 'Electrical Components',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // MISSING PRODUCTS
//            [
//                'slug' => 'side-mirror',
//                'name' => 'Side Mirror',
//                'price' => 2200,
//                'short' => 'Durable side mirror for clear rear view.',
//                'image' => 'Side.png',
//                'description' => 'High-quality side mirror with robust construction and perfect fit.',
//                'category' => 'Body Components',
//                'created_at' => now(),
//                'updated_at' => now()
//            ],
            [
                'slug' => 'bmw-wheels',
                'name' => 'BMW Wheels',
                'price' => 55000,
                'short' => 'Premium BMW alloy wheels.',
                'image' => 'bmw wheels.png',
                'description' => 'High-quality alloy wheels designed for BMW cars for superior performance.',
                'category' => 'Tires & Wheels',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'Bosch-oil-filter',
                'name' => 'Bosch Oil Filter',
                'price' => 1300,
                'short' => 'Efficient oil filter for longer engine life.',
                'image' => 'bosch oil filter.png',
                'description' => 'Premium filtration for smooth engine performance.',
                'category' => 'Engine Parts',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'brake-pad-1',
                'name' => 'Brake Pad 1',
                'price' => 3200,
                'short' => 'Durable brake pad for reliable stopping.',
                'image' => 'brake1.png',
                'description' => 'High-performance brake pad with long lifespan.',
                'category' => 'Brake System',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'brake-pad-2',
                'name' => 'Brake Pad 2',
                'price' => 3400,
                'short' => 'High-quality brake pad for safe driving.',
                'image' => 'brake2.png',
                'description' => 'Long-lasting brake pad designed for consistent braking performance.',
                'category' => 'Brake System',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'camshaft-part',
                'name' => 'camshaft Part',
                'price' => 2900,
                'short' => 'Durable automotive part.',
                'image' => 'camshaft.png',
                'description' => 'High-quality Camshaft part for smooth vehicle operation.',
                'category' => 'Engine Parts',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'car-ecu',
                'name' => 'Car ECU',
                'price' => 48000,
                'short' => 'Engine Control Unit for optimal performance.',
                'image' => 'car ecu.png',
                'description' => 'Advanced ECU for managing engine parameters efficiently.',
                'category' => 'Electrical Components',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'car-jumper',
                'name' => 'Car Jumper Cables',
                'price' => 1200,
                'short' => 'Essential jumper cables for car battery emergencies.',
                'image' => 'car jumper.png',
                'description' => 'Durable and heavy-duty jumper cables for quick battery boosting.',
                'category' => 'Electrical Components',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'car-screen',
                'name' => 'Car Screen',
                'price' => 8500,
                'short' => 'Touchscreen display for car entertainment system.',
                'image' => 'Car screen.png',
                'description' => 'High-resolution display for navigation, media, and car control features.',
                'category' => 'Electronics',
                'created_at' => now(),
                'updated_at' => now()
            ],
//            [
//                'slug' => 'clutch-plate-standard',
//                'name' => 'Clutch Plate',
//                'price' => 7800,
//                'short' => 'Standard clutch plate for smooth shifting.',
//                'image' => 'clutch plate.png',
//                'description' => 'Durable clutch plate ensuring responsive gear changes.',
//                'category' => 'Transmission',
//                'created_at' => now(),
//                'updated_at' => now()
//            ],
            [
                'slug' => 'engine-block',
                'name' => 'Engine Block',
                'price' => 95000,
                'short' => 'High-strength engine block.',
                'image' => 'engine block.png',
                'description' => 'Premium engine block designed for durability and performance.',
                'category' => 'Engine Parts',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'engine-basic',
                'name' => 'Engine',
                'price' => 120000,
                'short' => 'Reliable car engine.',
                'image' => 'engine.png',
                'description' => 'High-performance engine with excellent fuel efficiency and durability.',
                'category' => 'Engine Parts',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'gear-knob-1',
                'name' => 'Gear Knob 1',
                'price' => 500,
                'short' => 'Ergonomic gear knob for smooth shifting.',
                'image' => 'gear knob 1.png',
                'description' => 'Comfortable gear knob designed for easy handling and stylish look.',
                'category' => 'Transmission',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'headlight-bulb',
                'name' => 'Headlight Bulb',
                'price' => 650,
                'short' => 'Bright headlight bulb for improved visibility.',
                'image' => 'headlight bulb.png',
                'description' => 'Long-lasting headlight bulb providing excellent illumination.',
                'category' => 'Lights',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'headlights-standard',
                'name' => 'Headlights',
                'price' => 8000,
                'short' => 'Standard car headlights.',
                'image' => 'headlights.png',
                'description' => 'Reliable headlights for day and night driving.',
                'category' => 'Lights',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'k1-Crankshaft',
                'name' => 'K1 Technologies Crankshaft',
                'price' => 48000,
                'short' => 'Durable automotive part.',
                'image' => 'K1 technologies crankshaft.png',
                'description' => 'High-performance component for enhanced engine efficiency.',
                'category' => 'Engine Parts',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'porsche-wheels',
                'name' => 'Porsche Wheels',
                'price' => 65000,
                'short' => 'Premium alloy wheels for Porsche cars.',
                'image' => 'porsche wheels.png',
                'description' => 'High-quality wheels for excellent handling and aesthetics.',
                'category' => 'Tires & Wheels',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'rear-lights',
                'name' => 'Rear Lights',
                'price' => 4200,
                'short' => 'Durable rear lights for safety.',
                'image' => 'rear lights.png',
                'description' => 'High-visibility rear lights designed for long life and reliability.',
                'category' => 'Lights',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'car-seats-standard',
                'name' => 'Car Seats',
                'price' => 8000,
                'short' => 'Comfortable car seats for everyday use.',
                'image' => 'seats.png',
                'description' => 'Ergonomic design ensuring comfort and durability for all passengers.',
                'category' => 'Body Components',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'suspension-arms',
                'name' => 'Suspension Arms',
                'price' => 6500,
                'short' => 'High-quality suspension arms for smooth ride.',
                'image' => 'suspension arms.png',
                'description' => 'Durable suspension arms ensuring stability and handling.',
                'category' => 'Suspension Parts',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'suspension-standard',
                'name' => 'Suspension',
                'price' => 12000,
                'short' => 'Reliable suspension system.',
                'image' => 'suspension.png',
                'description' => 'High-performance suspension for comfort and stability.',
                'category' => 'Suspension Parts',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'turn-signal',
                'name' => 'Turn Signal',
                'price' => 900,
                'short' => 'High-visibility turn signal light.',
                'image' => 'turn signal.png',
                'description' => 'Bright LED turn signal for safety and reliability.',
                'category' => 'Lights',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'slug' => 'wheel-standard',
                'name' => 'Wheel',
                'price' => 6000,
                'short' => 'Standard car wheel.',
                'image' => 'wheel.png',
                'description' => 'Durable wheel with excellent handling properties.',
                'category' => 'Tires & Wheels',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
