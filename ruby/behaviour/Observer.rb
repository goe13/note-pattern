module Observer

    class Observer
        attr_accessor :state
        def initialize
        end
        def update(state)
            @state = state
        end
    end

    class Subject
        def initialize
            @observers = []
        end
        def addObserver(obs)
            @observers << obs
        end
        def changeAll(state)
            @observers.each do |obs|
                obs.update state
            end
        end
    end


    module Test
        obs1 = Observer.new
        obs2 = Observer.new

        subj = Subject.new
        subj.addObserver obs1
        subj.addObserver obs2

        puts obs1.state
        puts obs2.state

        subj.changeAll 12
        
        puts obs1.state
        puts obs2.state

    end
    
end