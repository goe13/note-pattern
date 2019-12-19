# Creaters

module Singleton

    class Singleton
        @@instance = nil
        def self.instance
            @@instance = new unless @@instance
            @@instance
        end
    end


    module Test
        s = Singleton.instance
        s2 = Singleton.instance
        s3 = Singleton.instance

        puts s.object_id
        puts s2.object_id
        puts s3.object_id
    end

end