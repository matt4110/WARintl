function SwapTxt($i) {
	// Find the div to swap text on
	var ele = document.getElementById('ProgramCategoriesInfo');
	
	// Swap the text based on which element was moused over
	if($i == 1) {
		ele.innerHTML = "<h1>International Safehouses</h1><p>WAR, Int’l is determined to see the end of sex trafficking, a growing global market. Our international partners attack this systemic growth by entering red light districts and offering freedom. Once in a safehouse, a woman can begin her journey of emotional, spiritual, and physical healing. We help our partners make this a reality by providing consultations, connections, and resources to not only reach, rescue and restore, but to empower women.  Through employment, vocational training, education and life skills, at-risk women can build a future with safety, hope, and dignity.</p>";
	}
	if($i == 2) {
		ele.innerHTML = '<h1>Domestic Safehouses</h1><p>WAR, Int’l is passionate about protecting at-risk women in the “land of the free.” Our U.S. partners offer hope and escape through diverse forms of outreach. Whether they reach wounded women in prisons, strip clubs, or porn conventions, each safehouse provides a carefully crafted program for holistic healing. With physical, spiritual, and emotional care, women begin the road to restoration and empowerment. As they heal, they build new futures— pursuing employment, vocational training, GEDs, and college degrees. WAR often supplies scholarships for such opportunities, while continually providing connections, consultations, resources, and sustainable support to safehouses.  This enables our U.S. partners to create and continue their work of rescuing, restoring, and empowering at-risk women.</p>';
	}
	if($i == 3) {
		ele.innerHTML = "<h1>Vocational Training</h1><p>Learning to work with dignity is a powerful part of the healing process. Our partners are committed to taking this journey with wounded women. Some vocational training programs are operated by safehouses, opening their doors to those at-risk, while others function as women’s centers. No matter their location, women find job skills training, medical aid, and other resources within the safety of their new community. These skills provide hands-on experience that act as sustainable support or open doors to professional employment. WAR, Int’l comes alongside these programs by analyzing economic opportunities, designing new programs, sending skilled trainers, fundraising for expansions, and carrying product. We have built clinics, chapels, and schools, as our partners expand their reach and sustainability. WAR has watched with excitement as wounded women become empowered, beginning their own businesses, changing their futures, and breaking the cycle of poverty.</p>";
	}
	if($i == 4) {
		ele.innerHTML = "<h1>Micro-Enterprise</h1><p>WAR, Int’l believes that microenterprise is a powerful way to “rescue” those at risk. If a woman can support herself, not only is she empowered—she is protected. She will not be lured by the money and opportunity “promised” by traffickers. If she is rescued from slavery, this empowerment is essential to the healing process—erasing lies of worthlessness and forging a new future. WAR takes part in this protection and healing through business coaching, vocational skills training, marketing plans, administrative instruction, microloans and more. The WARChest Boutiques and home parties help to sell our partner’s products, ensuring that microenterprises are successful. WAR is committed to walking alongside those supporting themselves with dignity—offering a hand up, not a hand out.</p>";
	}
	if($i == 5) {
		ele.innerHTML = "<h1>Education</h1><p>An educated, empowered woman creates a legacy of safety for her family. She can provide for her children, educate them, and change the trajectory of generations to come. Educated women and children become leaders in their communities. They begin businesses, employ others at-risk, and garner the respect of their cultures. WAR, Int’l helps create, grow, and expand our partners’ educational programs. We develop business plans, budgets, and fundraise for new facilities. Students are supplied with teachers, clean water, classroom materials, and all kinds of scholarships. WAR also offers preventative education programs, providing women with the knowledge and skills needed to protect themselves from abuse and exploitation. In the “land of the free”, WAR, Int’l teaches Americans to identify and report trafficking in their own neighborhoods. Whether across the street or around the globe, WAR, Int’l believes in the power of education to protect and empower at risk women and children.</p>";
	}
	if($i == 6) {
		ele.innerHTML = "<h1>Orphanage</h1><p>Violence, disease, natural disasters, and poverty all have the power to destroy families. Without parents, children become more vulnerable to exploitation and loss. Worldwide, WAR’s partners work to provide family, education, counseling, and medical care to orphaned teens, children, and babies. The WAR family loves to make these children feel cared for. When traveling overseas, WAR staff visits orphanages, bringing coloring books, crayons, crafts, and toys for the kids. In addition to donations, WAR fundraises to outfit orphanages with dormitories, playgrounds, appliances, and more. WAR medical scholarships ensure that children are healthy and happy while educational and vocational scholarships allow older orphans to pursue their dreams. By caring for orphans, WAR partners “rescue” children from the risk of exploitation and prepare them for futures of dignity and hope.</p>";
	}
	if($i == 7) {
		ele.innerHTML = "<h1>Medical Aid</h1><p>Many cultures marginalize those with disabilities and disease. Providing scholarships for simple operations buys back value in the eyes of a community. In the Middle East, WAR, Int’l reaches out to acid attack victims. Funding reconstructive surgeries not only offers hope and healing to a woman, but it declares that she has dignity and value despite an act of utter dehumanization. Many trafficking victims also undergo extreme abuse. WAR offers immediate medical care to these women and children, who, through partnering safehouses, are tenderly cared for and safely repatriated home. WAR’s medical programs also go beyond recovery, and work to prevent risk issues. Scholarship funds have sponsored medical equipment for neonatal clinics and other health centers. WAR’s tube well program prevents disease, violent attacks, and brings value to vulnerable women. With a variety of medical programs and partnerships, WAR, Int’l is able reach those at-risk through preventative, curative, and supportive measures.</p>";
	}
	if($i == 8) {
		ele.innerHTML = "<h1>Emergency Intervention</h1><p>When a woman runs into WAR headquarters looking for shelter, or knocks on safehouse doors seeking sanctuary, we respond. When partners receive phone calls in the dead of night, or hear of babies being sold, we respond. Emergency Intervention programs make this possible. In such an emergency, there is no time to raise funds—the woman is gone, the baby is sold. Building an endowment for these programs enables us to act immediately—to rescue, to repatriate, to give medical aid, or simply to offer a rescued woman clean, comfortable clothing. With rescue, a woman is able to begin her journey toward restoration and empowerment. Her cries are no longer silenced, but are able to become a loud voice for freedom.</p>";
	}
	if($i == 9) {
		ele.innerHTML = '<h1>Outreach</h1><p>Soap labeled with the human trafficking hotline number, stripper Bible studies, and pornography convention booths are a few creative ways our partners reach out to at-risk women. While partnering safehouse staffs often enter red light districts to reach and rescue women, these WAR, Int’l programs specialize in outreach. They build relationships with those in the adult entertainment industry, and provide emergency resources to captives of sex trafficking. WAR, Int’l functions as a dynamic networking hub and emergency resource for outreach partners. We locate shelters, create safe places, and outfit apartments for at-risk or rescued women. WAR often funds emergency rescue initiatives—mobilizing the community in wide-spread anti-trafficking outreach. Whether at truck stops, strip clubs, tourist events, or local establishments, WAR, Int’l is passionate about reaching those at risk in the “land of the free”.</p>';
	}
}

function DefaultTxt() {
	// Find the div to swap text on
	var ele = document.getElementById('ProgramCategoriesInfo');
	
	// Set the text to its default value
	ele.innerHTML ='<h1>Programs</h1><p>The mission of Women At Risk, International is to create circles of protection around women and children, worldwide. Through preventative, curative, and supportive programs, those at-risk find hope.</p><p>Preventative programs safeguard women and children from exploitation, ensuring futures of dignity and worth. Those who were once trafficked, abused, or abandoned find safety, comfort, and healing within curative communities. These projects and partners thrive through the encouragement of WAR’s supportive networks, making it possible to rescue, restore, and empower.</p><p>Search our nine categories and discover a program that empowers you too. Whether international safehouses, microenterprises, or medical aid, each presents an opportunity to lift wounded women and children to places of dignity. Mothers, mechanics, school teachers, and surgeons all have the ability to take action against that which threatens safety, hope, and freedom.</p>';
}

function SwapTxtTo($id) {
	// Find the div to swap text on
	var ele = document.getElementById('ProgramCategoriesInfo');
	var id = $id;
	// Find the div containing the Program Info
	var ele2 = document.getElementById(id);
	// Clear all List Items of ProgramCatSelected class tag
	var ele42 = document.getElementsByClassName('ProgramCatSelected');
	if (ele42.length > 0) {
		ele42[0].className = ele42[0].className.replace(' ProgramCatSelected', '');
	}
	// Find the program title div and add ProgramCatSelected class to it
	var id2 = "program" + id;
	var ele3 = document.getElementById(id2);
	ele3.className += " ProgramCatSelected";
	// Change the innerHTML in the main div
	ele.innerHTML = ele2.innerHTML;
	ele2.style.display = "block";
	
} 

function scroll () {
	var ele = document.getElementById('ProgramCategoriesInfo');
	var ele2 = document.getElementById('container');
	if (window.pageYOffset >= 300) {
		ele.style.position = "relative";
		ele.style.left = "0px";
		ele.style.top = (pageYOffset - 300) + "px";
	}
	else {
		ele.style.position = "static";
	}
}